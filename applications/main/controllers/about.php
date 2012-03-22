<?php

namespace Main\Controllers;

use Phrame\Core;

class About extends Core\Controller
{
    public function index()
    {
        $this->layout->content = 'About '.$this->app->request->cookie('about');
    }
}
