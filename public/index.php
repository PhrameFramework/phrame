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
defined('APPLICATIONS_PATH') or define('APPLICATIONS_PATH', realpath(__DIR__.'/../applications'));

/**
 * Path to the packages
 */
defined('PACKAGES_PATH') or define('PACKAGES_PATH', realpath(__DIR__.'/../packages'));

/**
 * Path to the docroot
 */
defined('PUBLIC_PATH') or define('PUBLIC_PATH', __DIR__);

/**
 * Application name to be run
 */
defined('APPLICATION_NAME') or define('APPLICATION_NAME', getenv('APPLICATION_NAME') ?: 'main');

/**
 * Application environment
 */
defined('APPLICATION_ENV') or define('APPLICATION_ENV', getenv('APPLICATION_ENV') ?: 'development');

// Registering autoloader
spl_autoload_register(
    function ($class_name)
    {
        $file = str_replace('\\', '/', strtolower($class_name)).'.php';
        require_once is_file(APPLICATIONS_PATH.'/'.$file) ? APPLICATIONS_PATH.'/'.$file : PACKAGES_PATH.'/'.$file;
    }
);

// Booting
Phrame\Core\Bootstrap::init();
