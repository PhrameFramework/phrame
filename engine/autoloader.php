<?php
/**
 * Part of the Phrame
 *
 * @package    Phrame
 * @version    0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

namespace Engine;

class Autoloader
{
    /**
     * Loads the given class or interface
     *
     * @param  string  $class_name  The name of the class to load
     */
    public static function load($class_name)
    {
        $class_name = strtolower(str_replace('\\', '/', $class_name));

        if (stripos($class_name, __NAMESPACE__) === 0)
        {
            $class_name = substr($class_name, strlen(__NAMESPACE__) + 1);
            if (is_file(ENGINE_PATH.'/'.$class_name.'.php'))
            {
                require_once ENGINE_PATH.'/'.$class_name.'.php';
            }
        }
        elseif (is_file(APPLICATIONS_PATH.'/'.$class_name.'.php'))
        {
            require_once APPLICATIONS_PATH.'/'.$class_name.'.php';
        }
    }
    
}
