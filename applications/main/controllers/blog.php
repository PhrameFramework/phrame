<?php

namespace Applications\Main\Controllers;

use Phrame\Core;

class Blog extends Core\Controller
{
    public function index()
    {
        $this->layout->content = Core\Application::instance('blog')->process_uri('/')->render(false)->content;
    }

    public function post($id)
    {
        $this->layout->content = Core\Application::instance('blog')->process()->render(false)->content;
    }

}
