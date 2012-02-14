<?php

namespace Main\Controller;

use Engine;

class Home extends Engine\Controller
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
