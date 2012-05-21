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
    /**
     * Validates form data
     *
     * @return  bool
     */
    public function is_valid()
    {
        $is_valid = $this->validator->is_valid($this->username, 'required', $this->app->lang->get('Username'));
        $is_valid = $this->validator->is_valid($this->password, 'required', $this->app->lang->get('Password')) && $is_valid;

        $auth = new \Phrame\Auth\Auth($this->app_name);
        $login = $auth->login($this->username, $this->password);
        if ( ! $login)
        {
            $this->validator->errors[] = $this->app->lang->get('Wrong name or password');
        }

        $is_valid = $login && $is_valid;

        return $is_valid;
    }

}
