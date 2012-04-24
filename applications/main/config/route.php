<?php
/**
 * Route config
 * 
 * @see  packages/phrame/core/config/route.php
 */

return array(

    /**
     * Routes
     */
    'routes' => array(
        '^post/([0-9]+)'  => 'blog/post/$1',
        '^post/comment'   => 'blog/comment',
        
    ),
    
);
