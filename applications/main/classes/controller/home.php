<?php

namespace Main;

use Engine;

class Controller_Home extends Engine\Controller
{
    public function index()
    {
        $this->template->content = new Engine\View(
            'home',
            array(
                'name' => 'World'
            )
        );
    }
}
