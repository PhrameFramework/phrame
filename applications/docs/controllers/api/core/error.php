<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Error controller
 */
class Error extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/error', array(), $this->app_name);
    }

}
