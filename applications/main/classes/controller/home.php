<?php

namespace Main;

use Engine;

class Controller_Home extends Engine\Controller
{
    public function index($name = 'World')
    {
        $this->template->content = new Engine\View(
            'home',
            array(
                'name' => $name
            )
        );
    }
}
