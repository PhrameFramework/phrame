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
 * Path to the phrame
 */
define('PHRAME_PATH', __DIR__.'/../phrame');

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
require_once PHRAME_PATH.'/autoloader.php';
spl_autoload_register('Phrame\\Autoloader::load');

/**
 * Run application
 */
Phrame\Engine\Application::instance()->run();
