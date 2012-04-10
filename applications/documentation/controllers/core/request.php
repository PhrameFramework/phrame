<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Request extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/request', array(), $this->app_name);
    }
}
