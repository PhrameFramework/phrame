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
            $name      = $this->app->request->post('name');
            $password  = $this->app->request->post('password');

            $validator = new Core\Validator();

            if ($this->app->request->method() === 'POST')
            {
                $valid = $validator->validate($name, 'required');
                $valid = $validator->validate($password, 'required') && $valid;

                if ($valid and $auth->login($name, $password))
                {
                    $this->app->response->redirect($this->app->config['base_url']);
                }
            }

            $this->layout->content = new Core\View(
                'login',
                array(
                    'name'    => $name,
                    'errors'  => $validator->errors,
                )
            );
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
            if ($this->app->request->method() === 'POST')
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
