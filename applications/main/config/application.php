<?php
/**
 * Application config
 * 
 * @see  packages/phrame/core/config/application.php
 */

return array(

    /**
     * Use php sessions
     */
    'use_sessions'     => true,

    /**
     * Packages to load
     */
    'packages'         => array(
        'phrame/activerecord',
        'phrame/auth',

    ),

);
