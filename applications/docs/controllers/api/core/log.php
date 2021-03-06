<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Log controller
 */
class Log extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/log', array(), $this->app_name);
    }

}
