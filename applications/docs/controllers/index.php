<?php

namespace Docs\Controllers;

use Phrame\Core;

/**
 * Index controller
 */
class Index extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('index', array(), $this->app_name);
    }

}
