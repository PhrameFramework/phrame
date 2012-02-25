<?php

namespace Applications\Main\Controllers;

use Packages\Phrame;

class Blog extends Phrame\Controller
{
    public function index()
    {
        $this->layout->content = Phrame\Application::instance('blog')->process_uri('/')->render(false);
    }

    public function post($id)
    {
        $this->layout->content = Phrame\Application::instance('blog')->process()->render(false);
    }

}
