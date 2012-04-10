<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Error extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/error', array(), $this->app_name);
    }
}
