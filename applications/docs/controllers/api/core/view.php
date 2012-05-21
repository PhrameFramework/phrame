<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * View controller
 */
class View extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/view', array(), $this->app_name);
    }

}
