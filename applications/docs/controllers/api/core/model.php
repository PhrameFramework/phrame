<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Model controller
 */
class Model extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/model', array(), $this->app_name);
    }

}
