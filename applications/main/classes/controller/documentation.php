<?php

namespace Main;

use Engine;

class Controller_Documentation extends Engine\Controller
{
    public function index()
    {
        $this->template->content = 'documentation';
    }
}
