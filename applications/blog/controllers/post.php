<?php

namespace Blog\Controllers;

use Phrame\Core;
use Blog\Models;

class Post extends Core\Controller
{
    public function index($id)
    {
        $post = Models\Post::find_by_id($id);

        if ( ! empty($post))
        {
            $this->layout->content = new Core\View(
                'post',
                array(
                    'post' => $post
                ),
                $this->app_name
            );
        }
        else
        {
            $this->error_404();
        }
    }

    public function comment()
    {
        $post_id        = $this->app->request->post('post_id');
        $comment_author = $this->app->request->post('comment_author');
        $comment_text   = $this->app->request->post('comment_text');

        if ( ! empty($post_id) and ! empty($comment_author) and ! empty($comment_text))
        {
            $comment = new Models\Comment();
            $comment->post_id         = $post_id;
            $comment->comment_date    = date('Y-m-d H:i');
            $comment->comment_author  = $comment_author;
            $comment->comment_text    = $comment_text;
            $comment->save();
        }

        $url = $this->app->config->base_url.'/post/'.$post_id;
        $this->app->response->redirect($url);
    }

}
