<?php

namespace Applications\Main\Controllers;

use Phrame\Engine;

class Documentation extends Engine\Controller
{
    public function index()
    {
        $this->layout->content = Engine\Application::instance('documentation')->process_uri('/')->render();
    }
}
