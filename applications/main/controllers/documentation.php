<?php

namespace Main\Controllers;

use Phrame\Core;

class Documentation extends Core\Controller
{
    public function index()
    {
        $this->layout->content = Core\Application::instance('documentation')->process_uri('/')->render();
    }
}
