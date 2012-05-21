<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Asset controller
 */
class Asset extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/asset', array(), $this->app_name);
    }

}
