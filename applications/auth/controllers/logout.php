<?php

namespace Auth\Controllers;

use Phrame\Core;

class Logout extends Core\Controller
{
    public function index()
    {
        $auth = new \Phrame\Auth\Auth($this->app_name);

        if ( ! $auth->authenticated())
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
