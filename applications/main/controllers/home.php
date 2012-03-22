<?php

namespace Main\Controllers;

use Phrame\Core;

class Home extends Core\Controller
{
    public function index($name = 'Phrame')
    {
        $this->layout->content = new Core\View(
            'home',
            array(
                'name' => $name
            )
        );

        $this->app->response->cookie('about', $name);
    }

}
