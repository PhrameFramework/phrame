<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Form controller
 */
class Form extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/form', array(), $this->app_name);
    }

}
