<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Controller extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/controller', array(), $this->app_name);
    }
}
