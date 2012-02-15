<?php

namespace Applications\Main\Controllers;

use Phrame\Engine;

class About extends Engine\Controller
{
    public function index()
    {
        $this->template->content = 'about';
    }
}
