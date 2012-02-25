<?php

namespace Applications\Main\Controllers;

use Packages\Phrame;

class About extends Phrame\Controller
{
    public function index()
    {
        $this->layout->content = 'About '.$this->application->request->cookie('about');
    }
}
