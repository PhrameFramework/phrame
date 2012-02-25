<?php

namespace Applications\Blog\Controllers;

use Packages\Phrame;
use Applications\Blog\Models;

class Home extends Phrame\Controller
{
    public function index()
    {
        $this->layout->content = new Phrame\View(
            'home',
            array(
                'posts' => Models\Post::find('all'),
            ),
            $this->application
        );
    }

}
