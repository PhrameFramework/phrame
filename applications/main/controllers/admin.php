<?php

namespace Main\Controllers;

use Phrame\Core;

class Admin extends Core\Controller
{
    public function init()
    {
        parent::init();

        $this->filters = array(
            'before_action' => function($controller)
            {
                $auth = new \Phrame\Auth\Auth($controller->app_name);
                if ( ! $auth->is_authenticated())
                {
                    $controller->app->response->redirect('/auth');
                }
            },

        );
    }

    public function index()
    {
        $this->layout->content = new Core\View('admin');
    }

}
