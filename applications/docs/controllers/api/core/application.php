<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Application controller
 */
class Application extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/application', array(), $this->app_name);
    }

}
