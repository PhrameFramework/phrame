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
        '^post/([a-zA-Z0-9]+)'  => 'post/index/$1',
        
    ),
    
);
