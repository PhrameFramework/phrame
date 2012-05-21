<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Applications controller
 */
class Applications extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/applications', array(), $this->app_name);
    }

}
