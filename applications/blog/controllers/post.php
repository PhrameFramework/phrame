<?php

namespace Applications\Blog\Controllers;

use Phrame\Core;
use Applications\Blog\Models;

class Post extends Core\Controller
{
    public function index($id)
    {
        $this->layout->content = new Core\View(
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
            ),
            $this->application
        );
    }

}
