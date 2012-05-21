<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Controller controller
 */
class Controller extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/controller', array(), $this->app_name);
    }

}
