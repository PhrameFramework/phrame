<?php

namespace Applications\Main\Controllers;

use Phrame\Engine;

class Blog extends Engine\Controller
{
    public function index()
    {
        $this->layout->content = Engine\Application::instance('blog')->process('/')->render(false);
    }

    public function post($id)
    {
        $this->layout->content = Engine\Application::instance('blog')->process()->render(false);
    }

}
