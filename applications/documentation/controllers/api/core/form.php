<?php

namespace Documentation\Controllers\Api\Core;

use Phrame\Core;

class Form extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/form', array(), $this->app_name);
    }
}
