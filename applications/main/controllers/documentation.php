<?php

namespace Applications\Main\Controllers;

use Phrame\Engine;

class Documentation extends Engine\Controller
{
    public function index()
    {
        $request = new Engine\Request(Engine\Application::instance('documentation'));
        $request->server('request_uri', '/');

        $this->layout->content = Engine\Application::instance('documentation')->process($request)->render();
    }
}
