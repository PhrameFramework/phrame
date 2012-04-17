<?php

namespace Documentation\Controllers\Api\Core;

use Phrame\Core;

class Asset extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('api/core/asset', array(), $this->app_name);
    }
}
