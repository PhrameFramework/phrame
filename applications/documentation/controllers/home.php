<?php

namespace Documentation\Controllers;

use Phrame\Core;

class Home extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('home', array(), $this->app_name);
    }
}
