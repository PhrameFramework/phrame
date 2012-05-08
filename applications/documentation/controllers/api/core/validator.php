<?php

namespace Documentation\Controllers\Api\Core;

use Phrame\Core;

class Validator extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/validator', array(), $this->app_name);
    }
}
