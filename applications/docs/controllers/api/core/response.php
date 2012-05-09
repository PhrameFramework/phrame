<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

class Response extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/response', array(), $this->app_name);
    }
}
