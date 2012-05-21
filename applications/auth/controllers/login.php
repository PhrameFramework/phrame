<?php

namespace Auth\Controllers;

use Phrame\Core;

/**
 * Login controller
 */
class Login extends Core\Controller
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
            $form = new \Auth\Forms\Login('login', $this->app->request->post(), $this->app_name);

            if ($this->app->request->is_post() and $form->is_valid())
            {
                // redirect to the main app homepage
                $this->app->response->redirect(Core\Applications::get_instance()->config['base_url']);
            }

            $this->layout->content = $form;
        }
        else
        {
            $this->app->response->redirect($this->app->config['base_url'].'/logout');
        }
    }

}
