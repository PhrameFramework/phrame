<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Log extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/log', array(), $this->app_name);
    }
}
