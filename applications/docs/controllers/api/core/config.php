<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Config controller
 */
class Config extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/config', array(), $this->app_name);
    }

}
