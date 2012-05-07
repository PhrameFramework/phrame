<?php

namespace Auth\Forms;

use Phrame\Core;

/**
 * Login form
 *
 * @property  string  $username
 * @property  string  $password
 */
class Login extends Core\Form
{
    public function valid()
    {
        $valid = $this->validator->validate($this->username, 'required', $this->app->lang->get('Username'));
        $valid = $this->validator->validate($this->password, 'required', $this->app->lang->get('Password')) && $valid;

        $auth = new \Phrame\Auth\Auth($this->app_name);
        $login = $auth->login($this->username, $this->password);
        if ( ! $login)
        {
            $this->validator->errors[] = $this->app->lang->get('Wrong name or password');
        }

        $valid = $login && $valid;

        return $valid;
    }

}
