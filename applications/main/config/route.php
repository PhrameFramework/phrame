<?php

return array(

    /**
     * Default controller name
     */
    'default_controller' => 'home',

    /**
     * Default action name
     */
    'default_action'     => 'index',

    /**
     * Routes
     */
    'routes' => array(
        '^docs$'          => 'documentation',
        '^post/([0-9]+)'  => 'blog/post/$1',
        '^post/comment'   => 'blog/comment',
        
    ),
    
);
