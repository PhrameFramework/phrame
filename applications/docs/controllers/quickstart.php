<?php

namespace Docs\Controllers;

use Phrame\Core;

class Quickstart extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('quickstart', array(), $this->app_name);
    }

}
