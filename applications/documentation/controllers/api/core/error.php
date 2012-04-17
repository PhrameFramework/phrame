<?php

namespace Documentation\Controllers\Api\Core;

use Phrame\Core;

class Error extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/error', array(), $this->app_name);
    }
}
