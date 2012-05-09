<?php

namespace Docs\Controllers\Api\Core;

use Phrame\Core;

class View extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/view', array(), $this->app_name);
    }
}
