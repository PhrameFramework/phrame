<?php

namespace Main\Controllers;

use Phrame\Core;

class Documentation extends Core\Controller
{
    public function index()
    {
        // This shows how to handle a specific uri in another application and to get some layout's variable
        $this->layout->content = Core\Application::instance('documentation')->response('/')->body()->content;
    }
}
