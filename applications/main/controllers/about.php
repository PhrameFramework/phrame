<?php

namespace Main\Controllers;

use Phrame\Core;

/**
 * About controller
 */
class About extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View('about');
    }

}
