<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Response extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/response', array(), $this->app_name);
    }
}
