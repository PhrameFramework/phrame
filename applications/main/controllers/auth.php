<?php

namespace Main\Controllers;

use Phrame\Core;

class Auth extends Core\Controller
{
    public function index()
    {
        $auth = new \Phrame\Auth\Auth();

        if ( ! $auth->authenticated())
        {
            $this->app->response->redirect($this->app->config['base_url'].'/auth/login');
        }
        else
        {
            $this->app->response->redirect($this->app->config['base_url'].'/auth/logout');
        }
    }

    public function login()
    {
        $auth = new \Phrame\Auth\Auth();

        if ( ! $auth->authenticated())
        {
            $form = new \Main\Forms\Login('login', $this->app->request->post());

            if ($this->app->request->is_post() and $form->valid())
            {
                $this->app->response->redirect($this->app->config['base_url']);
            }

            $this->layout->content = $form;
        }
        else
        {
            $this->app->response->redirect($this->app->config['base_url'].'/auth/logout');
        }
    }

    public function logout()
    {
        $auth = new \Phrame\Auth\Auth();

        if ( ! $auth->authenticated())
        {
            $this->app->response->redirect($this->app->config['base_url'].'/auth/login');
        }
        else
        {
            if ($this->app->request->is_post())
            {
                $auth->logout();

                $this->app->response->redirect($this->app->config['base_url'].'/auth/login');
            }
            else
            {
                $this->layout->content = new Core\View('logout');
            }
        }
    }

}
