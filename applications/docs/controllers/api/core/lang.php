<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

class Lang extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/lang', array(), $this->app_name);
    }
}
