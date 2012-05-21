<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Route controller
 */
class Route extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/route', array(), $this->app_name);
    }

}
