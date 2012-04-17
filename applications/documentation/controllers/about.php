<?php

namespace Documentation\Controllers;

use Phrame\Core;

class About extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('about', array(), $this->app_name);
    }

}
