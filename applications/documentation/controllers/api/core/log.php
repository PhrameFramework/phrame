<?php

namespace Documentation\Controllers\Api\Core;

use Phrame\Core;

class Log extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/log', array(), $this->app_name);
    }
}
