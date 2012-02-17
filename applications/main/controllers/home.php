<?php

namespace Applications\Main\Controllers;

use Phrame\Engine;

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

        $this->application->response->cookie('about', $name);
    }
}
