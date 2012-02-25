<?php

namespace Applications\Main\Controllers;

use Packages\Phrame;

class Documentation extends Phrame\Controller
{
    public function index()
    {
        $this->layout->content = Phrame\Application::instance('documentation')->process_uri('/')->render();
    }
}
