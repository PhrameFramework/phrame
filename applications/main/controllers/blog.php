<?php

namespace Main\Controllers;

use Phrame\Core;

class Blog extends Core\Controller
{
    public function index()
    {
        // This shows how to handle a specific uri in another application and to get some layout's variable
        $this->layout->content = Core\Applications::instance('blog')->response('/')->body->content;
    }

    public function post($id)
    {
        // This shows how to handle request in another application and to get content
        $this->layout->content = Core\Applications::content('blog');
    }

    public function comment()
    {
        // Simple handling of a specific uri in another application
        Core\Applications::run('blog/post/comment');
    }
}
