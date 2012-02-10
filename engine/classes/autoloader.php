<?php
/**
 * Part of the Phramework.
 *
 * @package    Phramework
 * @version    0
 * @author     Phramework Development Team
 * @license    MIT License
 * @copyright  2012 Phramework Development Team
 * @link       http://p.tld
 */

class Autoloader
{
    /**
     * Loads the given class or interface
     *
     * @param  string  $class_name  The name of the class to load
     */
    public static function load($class_name)
    {
        if (is_file(ENGINE_PATH.'/classes/'.strtolower($class_name).'.php'))
        {
            require_once ENGINE_PATH.'/classes/'.strtolower($class_name).'.php';
        }
        elseif (is_file(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/classes/controller/'.strtolower($class_name).'.php'))
        {
            require_once APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/classes/controller/'.strtolower($class_name).'.php';
        }
        elseif (is_file(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/classes/model/'.strtolower($class_name).'.php'))
        {
            require_once APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/classes/model/'.strtolower($class_name).'.php';
        }
    }
    
}
