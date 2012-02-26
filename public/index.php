<?php
/**
 * Part of the Phrame
 *
 * @package    Public
 * @version    0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

/**
 * Path to the applications
 */
define('APPLICATIONS_PATH', __DIR__.'/../applications');

/**
 * Path to the packages
 */
define('PACKAGES_PATH', __DIR__.'/../packages');

/**
 * Path to the docroot
 */
define('PUBLIC_PATH', __DIR__);

/**
 * Application to run
 */
define('APPLICATION_NAME', getenv('APPLICATION_NAME') ?: 'main');

/**
 * Application environment
 */
define('APPLICATION_ENV', getenv('APPLICATION_ENV') ?: 'development');

/**
 * Registering autoloader
 */
spl_autoload_register(
    function ($class_name)
    {
        $path = explode('\\', strtolower($class_name));
        $type = array_shift($path);
        $file = implode('/', $path).'.php';

        require_once ($type === 'applications' ? APPLICATIONS_PATH : PACKAGES_PATH).'/'.$file;
    }
);

/**
 * Booting
 */
Packages\Phrame\Bootstrap::init();
