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

namespace Phrame;

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

        require_once ($type === 'applications' ? APPLICATIONS_PATH : PHRAME_PATH).'/'.$file;
    }
    
}
