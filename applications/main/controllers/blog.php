<?php

namespace Applications\Main\Controllers;

use Phrame\Engine;

class Blog extends Engine\Controller
{
    public function index()
    {
        $request = new Engine\Request(Engine\Application::instance('blog'));
        $request->server('request_uri', '/');

        $this->layout->content = Engine\Application::instance('blog')->process($request)->render(false);
    }

    public function post($id)
    {
        $request = new Engine\Request(Engine\Application::instance('blog'));
        $request->server('request_uri', '/post/'.$id);
        
        $this->layout->content = Engine\Application::instance('blog')->process($request)->render(false);
    }

}
