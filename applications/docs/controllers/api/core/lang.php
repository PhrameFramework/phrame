<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Lang controller
 */
class Lang extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/lang', array(), $this->app_name);
    }

}
