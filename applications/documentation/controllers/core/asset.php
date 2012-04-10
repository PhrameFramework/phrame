<?php

namespace Documentation\Controllers\Core;

use Phrame\Core;

class Asset extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('core/asset', array(), $this->app_name);
    }
}
