<?php

namespace Main\Controllers;

use Phrame\Core;

class Index extends Core\Controller
{
    public function index()
    {
        $this->layout->content = new Core\View('index');
    }

}
