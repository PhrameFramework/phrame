<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Home extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/home', array(), $this->app_name);
    }
}
