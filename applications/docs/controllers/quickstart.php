<?php

namespace Docs\Controllers;

use Phrame\Core;

/**
 * Quickstart controller
 */
class Quickstart extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('quickstart', array(), $this->app_name);
    }

}
