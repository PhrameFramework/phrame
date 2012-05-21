<?php

namespace Docs\Controllers;

use Phrame\Core;

/**
 * Install controller
 */
class Install extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('install', array(), $this->app_name);
    }

}
