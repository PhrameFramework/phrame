<?php

namespace Documentation\Controllers\Api\Core;

use Phrame\Core;

class Config extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/config', array(), $this->app_name);
    }
}
