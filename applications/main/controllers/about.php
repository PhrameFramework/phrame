<?php

namespace Main\Controllers;

use Engine;

class About extends Engine\Controller
{
    public function index()
    {
        $this->template->content = 'about';
    }
}
