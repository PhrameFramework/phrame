<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Lang extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/lang', array(), $this->app_name);
    }
}