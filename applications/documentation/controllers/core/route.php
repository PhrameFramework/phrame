<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Route extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/route', array(), $this->app_name);
    }
}
