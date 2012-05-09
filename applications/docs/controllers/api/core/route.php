<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

class Route extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/route', array(), $this->app_name);
    }
}
