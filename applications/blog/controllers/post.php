<?php

namespace Blog\Controllers;

use Phrame\Core;
use Blog\Models;

class Post extends Core\Controller
{
    public function index($post_id)
    {
        $form = new \Blog\Forms\Comment('comment', $this->app->request->post(), $this->app_name);
        $form->post_id = $post_id;

        if ($this->app->request->is_post() and $form->valid())
        {
            $comment = new Models\Comment();
            $comment->post_id         = $form->post_id;
            $comment->comment_date    = date('Y-m-d H:i');
            $comment->comment_author  = $form->comment_author;
            $comment->comment_text    = $form->comment_text;
            $comment->save();

            $this->app->response->redirect($this->app->config['base_url'].'/post/'.$post_id);
        }

        $post = Models\Post::find_by_id($form->post_id);

        if ( ! empty($post))
        {
            $this->layout->content = new Core\View(
                'post',
                array(
                    'post'      => $post,
                    'comment'   => $form,
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
