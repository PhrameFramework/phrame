<?php

namespace Main\Controllers;

use Phrame\Core;

class Index extends Core\Controller
{
    public function index($name = 'Phrame')
    {
        $this->layout->content = new Core\View(
            'index',
            array(
                'name' => $name
            )
        );

        $this->app->response->cookie('about', $name);
    }

}
