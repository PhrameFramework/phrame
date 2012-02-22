<?php

namespace Applications\Blog\Controllers;

use Phrame\Engine;
use Applications\Blog\Models;

class Home extends Engine\Controller
{
    public function index()
    {
        $this->layout->content = new Engine\View(
            'home',
            array(
                'posts' => Models\Post::find('all'),
            ),
            $this->application
        );
    }

}
