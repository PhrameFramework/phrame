<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Application extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/application', array(), $this->app_name);
    }
}
