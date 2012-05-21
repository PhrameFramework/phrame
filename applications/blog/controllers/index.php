<?php

namespace Blog\Controllers;

use Phrame\Core;
use Blog\Models;

/**
 * Index controller
 */
class Index extends Core\Controller
{
    /**
     * Index action
     *
     * @return  void
     */
    public function index()
    {
        $this->layout->content = new Core\View(
            'index',
            array(
                'posts' => Models\Post::find('all'),
            ),
            $this->app_name
        );
    }

}
