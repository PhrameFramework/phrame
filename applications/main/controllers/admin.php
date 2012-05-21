<?php

namespace Main\Controllers;

use Phrame\Core;

/**
 * Admin controller
 */
class Admin extends Core\Controller
{
    /**
     * Initializes some properties
     *
     * @return  void
     */
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

    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('admin');
    }

}
