<?php

namespace Main\Controller;

use Engine;

class About extends Engine\Controller
{
    public function index()
    {
        $this->template->content = 'about';
    }
}
