<?php

namespace Auth\Controllers;

use Phrame\Core;

class Login extends Core\Controller
{
    public function index()
    {
        $auth = new \Phrame\Auth\Auth($this->app_name);

        if ( ! $auth->is_authenticated())
        {
            $form = new \Auth\Forms\Login('login', $this->app->request->post(), $this->app_name);

            if ($this->app->request->is_post() and $form->is_valid())
            {
                $this->app->response->redirect($this->app->config['base_url']);
            }

            $this->layout->content = $form;
        }
        else
        {
            $this->app->response->redirect($this->app->config['base_url'].'/logout');
        }
    }

}
