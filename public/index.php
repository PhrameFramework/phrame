<?php
/**
 * Part of the Phrame
 *
 * @package    Public
 * @version    0.4.0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

/**
 * Path to the applications
 */
define('APPLICATIONS_PATH', realpath(__DIR__.'/../applications'));

/**
 * Path to the packages
 */
define('PACKAGES_PATH', realpath(__DIR__.'/../packages'));

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
        $file = str_replace('\\', '/', strtolower($class_name)).'.php';
        
        require_once is_file(APPLICATIONS_PATH.'/'.$file) ? APPLICATIONS_PATH.'/'.$file : PACKAGES_PATH.'/'.$file;
    }
);

/**
 * Booting
 */
Phrame\Core\Bootstrap::init();
