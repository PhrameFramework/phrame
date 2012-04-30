<?php

namespace Main\Controllers;

use Phrame\Core;

class Login extends Core\Controller
{
    public function index()
    {
        $name      = $this->app->request->post('name');
        $password  = $this->app->request->post('password');

        $validator = new Core\Validator();

        if ($this->app->request->method() === 'POST')
        {
            $valid = $validator->validate($name, 'required');
            $valid = $validator->validate($password, 'required') && $valid;

            $auth = new \Phrame\Auth\Auth();

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

}
