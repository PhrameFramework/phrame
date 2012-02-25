<?php

namespace Applications\Blog\Controllers;

use Packages\Phrame;
use Applications\Blog\Models;

class Post extends Phrame\Controller
{
    public function index($id)
    {
        $this->layout->content = new Phrame\View(
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
