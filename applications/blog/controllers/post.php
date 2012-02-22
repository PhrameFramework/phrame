<?php

namespace Applications\Blog\Controllers;

use Phrame\Engine;
use Applications\Blog\Models;

class Post extends Engine\Controller
{
    public function index($id)
    {
        $this->layout->content = new Engine\View(
            'post',
            array(
                'post'      => Models\Post::find_by_id($id),
                'comments'  => Models\Comment::find(
                    'all',
                    array(
                        'conditions' => array(
                            'post_id = ?',
                            $id
                        )
                    )
                )
            )
        );
    }

}
