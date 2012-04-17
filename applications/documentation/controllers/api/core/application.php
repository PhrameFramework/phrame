<?php

namespace Documentation\Controllers\Api\Core;

use Phrame\Core;

class Application extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/application', array(), $this->app_name);
    }
}
