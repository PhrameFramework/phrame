<?php

namespace Auth\Controllers;

use Phrame\Core;

/**
 * Index controller
 */
class Index extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $auth = new \Phrame\Auth\Auth($this->app_name);

        if ( ! $auth->is_authenticated())
        {
            $this->app->response->redirect($this->app->config['base_url'].'/login');
        }
        else
        {
            $this->app->response->redirect($this->app->config['base_url'].'/logout');
        }
    }

}
