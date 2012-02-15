<?php

namespace Applications\Main\Controllers;

use Engine;

class Documentation extends Engine\Controller
{
    public function index()
    {
        $this->template->content = Engine\Application::instance('documentation')->process()->render();
    }
}
