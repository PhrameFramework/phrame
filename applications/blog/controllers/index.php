<?php

namespace Blog\Controllers;

use Phrame\Core;
use Blog\Models;

class Index extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View(
            'index',
            array(
                'posts' => Models\Post::find('all'),
            ),
            $this->app_name
        );
    }

}
