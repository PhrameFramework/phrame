<?php

namespace Main\Controllers;

use Phrame\Core;

class Blog extends Core\Controller
{
    public function index()
    {
        $this->layout->content = Core\Application::instance('blog')->process_uri('/')->body()->content;
    }

    public function post($id)
    {
        $this->layout->content = Core\Application::instance('blog')->process()->body()->content;
    }

    public function comment()
    {
        Core\Application::instance('blog')->process_uri('post/comment')->body();
    }
}
