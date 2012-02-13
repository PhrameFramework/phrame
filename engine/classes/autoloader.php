<?php
/**
 * Part of the Phramework.
 *
 * @package    Phramework
 * @version    0
 * @author     Phramework Development Team
 * @license    MIT License
 * @copyright  2012 Phramework Development Team
 * @link       http://phramework.itworks.in.ua/
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
        $namespace = 'Engine';
        $file_name = $class_name;

        if (strripos($class_name, '\\') !== false)
        {
            list($namespace, $file_name) = explode('\\', $class_name);
        }

        $file_name = str_replace('_', '/', strtolower($file_name)).'.php';

        if ($namespace === 'Engine' and is_file(ENGINE_PATH.'/classes/'.$file_name))
        {
            require_once ENGINE_PATH.'/classes/'.$file_name;
        }
        elseif (is_file(APPLICATIONS_PATH.'/'.strtolower($namespace).'/classes/'.$file_name))
        {
            require_once APPLICATIONS_PATH.'/'.strtolower($namespace).'/classes/'.$file_name;
        }
    }
    
}
