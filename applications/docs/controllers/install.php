<?php

namespace Docs\Controllers;

use Phrame\Core;

class Install extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('install', array(), $this->app_name);
    }

}
