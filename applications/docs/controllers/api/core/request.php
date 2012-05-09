<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

class Request extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/request', array(), $this->app_name);
    }
}
