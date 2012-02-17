<?php

namespace Applications\Main\Controllers;

use Phrame\Engine;

class About extends Engine\Controller
{
    public function index()
    {
        $this->template->content = 'About '.$this->application->request->cookie('about');
    }
}
