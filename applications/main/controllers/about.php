<?php

namespace Applications\Main\Controllers;

use Engine;
use Applications\Main\Models;

class About extends Engine\Controller
{
    public function index()
    {
        $this->template->content = 'about '.Models\User::find_by_id(1)->name;
    }
}
