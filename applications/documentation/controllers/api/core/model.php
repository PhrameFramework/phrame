<?php

namespace Documentation\Controllers\Api\Core;

use Phrame\Core;

class Model extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/model', array(), $this->app_name);
    }
}
