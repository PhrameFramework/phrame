<?php

namespace Applications\Blog\Controllers;

use Phrame\Core;
use Applications\Blog\Models;

class Home extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View(
            'home',
            array(
                'posts' => Models\Post::find('all'),
            ),
            $this->application
        );
    }

}
