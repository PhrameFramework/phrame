<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Request controller
 */
class Request extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/request', array(), $this->app_name);
    }

}
