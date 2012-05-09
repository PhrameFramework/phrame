<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

class Applications extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/applications', array(), $this->app_name);
    }
}
