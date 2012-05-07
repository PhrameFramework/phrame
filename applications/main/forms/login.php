<?php

namespace Main\Forms;

use Phrame\Core;

/**
 * Login form
 *
 * @property  string  $name
 * @property  string  $password
 */
class Login extends Core\Form
{
    public function valid()
    {
        $valid = $this->validator->validate($this->name, 'required', $this->app->lang->get('Name'));
        $valid = $this->validator->validate($this->password, 'required', $this->app->lang->get('Password')) && $valid;

        $auth = new \Phrame\Auth\Auth();
        $login = $auth->login($this->name, $this->password);
        if ( ! $login)
        {
            $this->validator->errors[] = 'Wrong name and password';
        }

        $valid = $login && $valid;

        return $valid;
    }

}
