<?php

namespace Blog\Controllers;

use Phrame\Core;
use Blog\Models;

class Post extends Core\Controller
{
    public function index($id)
    {
        $this->layout->content = new Core\View(
            'post',
            array(
                'post' => Models\Post::find_by_id($id)
            ),
            $this->application
        );
    }

}
