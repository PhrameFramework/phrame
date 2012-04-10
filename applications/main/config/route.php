<?php

return array(

    /**
     * Default controller name
     */
    'default_controller' => 'index',

    /**
     * Default action name
     */
    'default_action'     => 'index',

    /**
     * Routes
     */
    'routes' => array(
        '^post/([0-9]+)'  => 'blog/post/$1',
        '^post/comment'   => 'blog/comment',
        
    ),
    
);
