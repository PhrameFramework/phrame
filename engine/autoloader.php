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
        $path = explode('\\', strtolower($class_name));
        $type = array_shift($path);
        $file = implode('/', $path).'.php';

        $file_name = ENGINE_PATH.'/'.$file;

        if ($type === 'applications')
        {
            $file_name = APPLICATIONS_PATH.'/'.$file;
        }
        elseif ($type === 'extensions')
        {
            $file_name = EXTENSIONS_PATH.'/'.$file;
        }

        require_once $file_name;
    }
    
}
