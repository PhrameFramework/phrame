<?php

namespace Applications\Main\Controllers;

use Packages\Phrame;

class Home extends Phrame\Controller
{
    public function index($name = 'World')
    {
        $this->layout->content = new Phrame\View(
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
