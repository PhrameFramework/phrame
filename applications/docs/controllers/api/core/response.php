<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Response controller
 */
class Response extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/response', array(), $this->app_name);
    }

}
