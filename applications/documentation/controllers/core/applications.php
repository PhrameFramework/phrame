<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Applications extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/applications', array(), $this->app_name);
    }
}
