<?php

namespace Blog\Controllers;

use Phrame\Core;
use Blog\Models;

class Post extends Core\Controller
{
    public function index($post_id)
    {
        $comment_author = $this->app->request->post('comment_author');
        $comment_text   = $this->app->request->post('comment_text');

        $validator = new Core\Validator($this->app_name);

        if ($this->app->request->method() === 'POST')
        {
            $valid = $validator->validate($post_id, 'required');
            $valid = $validator->validate($comment_author, 'required', $this->app->lang->get('Name')) && $valid;
            $valid = $validator->validate($comment_text, 'required', $this->app->lang->get('Text')) && $valid;

            if ($valid)
            {
                $comment = new Models\Comment();
                $comment->post_id         = $post_id;
                $comment->comment_date    = date('Y-m-d H:i');
                $comment->comment_author  = $comment_author;
                $comment->comment_text    = $comment_text;
                $comment->save();

                $url = $this->app->config['base_url'].'/post/'.$post_id;
                $this->app->response->redirect($url);
            }
        }

        $post = Models\Post::find_by_id($post_id);

        if ( ! empty($post))
        {
            $this->layout->content = new Core\View(
                'post',
                array(
                    'post'           => $post,
                    'comment_author' => $comment_author,
                    'comment_text'   => $comment_text,
                    'errors'         => $validator->errors,
                ),
                $this->app_name
            );
        }
        else
        {
            $this->error_404();
        }
    }

}
