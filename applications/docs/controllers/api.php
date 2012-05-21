<?php

namespace Docs\Controllers;

use Phrame\Core;

/**
 * Api controller
 */
class Api extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api', array(), $this->app_name);
    }

}
