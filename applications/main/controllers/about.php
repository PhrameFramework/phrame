<?php

namespace Applications\Main\Controllers;

use Phrame\Core;

class About extends Core\Controller
{
    public function index()
    {
        $this->layout->content = 'About '.$this->application->request->cookie('about');
    }
}
