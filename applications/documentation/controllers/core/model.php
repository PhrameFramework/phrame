<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Model extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/model', array(), $this->app_name);
    }
}
