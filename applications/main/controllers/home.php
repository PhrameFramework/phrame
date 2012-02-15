<?php

namespace Applications\Main\Controllers;

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
