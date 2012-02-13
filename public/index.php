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

/**
 * Path to the engine
 */
define('ENGINE_PATH', __DIR__.'/../engine');

/**
 * Path to the applications
 */
define('APPLICATIONS_PATH', __DIR__.'/../applications');

/**
 * Path to the extensions
 */
define('EXTENSIONS_PATH', __DIR__.'/../extensions');

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
 * Booting
 */
require_once ENGINE_PATH.'/bootstrap.php';
require_once APPLICATIONS_PATH.'/bootstrap.php';
require_once APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/bootstrap.php';

/**
 * Run application
 */
Engine\Application::instance()->run();
