<?php

namespace Applications\Main\Controllers;

use Phrame\Core;

class Home extends Core\Controller
{
    public function index($name = 'World')
    {
        $this->layout->content = new Core\View(
            'home',
            array(
                'name' => $name
            )
        );

        $this->application->response->cookie('about', $name);
    }

    /**
     * Custom 404 handler
     */
    public function error_404()
    {
        $this->layout->content = 'Page Not Found';
    }

}
