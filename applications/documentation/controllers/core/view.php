<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class View extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/view', array(), $this->app_name);
    }
}
