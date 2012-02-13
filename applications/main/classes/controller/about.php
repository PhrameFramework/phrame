<?php

namespace Main;

use Engine;

class Controller_About extends Engine\Controller
{
    public function index()
    {
        $this->template->content = 'about';
    }
}
