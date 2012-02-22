<?php

namespace Applications\Main\Controllers;

use Phrame\Engine;

class Blog extends Engine\Controller
{
    public function index()
    {
        $this->layout->content = Engine\Application::instance('blog')->process()->render(false);
    }

    public function post($id)
    {
        $request         = new Engine\Request(Engine\Application::instance('blog'));
        $request->route  = new Engine\Route($request, Engine\Application::instance('blog'));
        $request->route->controller  = 'post';
        $request->route->action      = 'index';
        $request->route->parameters  = array($id);
        
        $this->layout->content = Engine\Application::instance('blog')->process($request)->render(false);
    }

}
