<?php

namespace Documentation\Controllers;

use Phrame\Core;

class Api extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api', array(), $this->app_name);
    }

}
