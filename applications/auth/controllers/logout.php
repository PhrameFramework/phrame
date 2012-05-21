<?php

namespace Auth\Controllers;

use Phrame\Core;

/**
 * Logout controller
 */
class Logout extends Core\Controller
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
            if ($this->app->request->is_post())
            {
                $auth->logout();

                $this->app->response->redirect($this->app->config['base_url'].'/login');
            }
            else
            {
                $this->layout->content = new Core\View('logout', null, $this->app_name);
            }
        }
    }

}
