<?php

namespace Documentation\Controllers\Api\Core;

use Phrame\Core;

class Controller extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/controller', array(), $this->app_name);
    }
}
