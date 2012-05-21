<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

/**
 * Validator controller
 */
class Validator extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('api/core/validator', array(), $this->app_name);
    }

}
