<?php
/**
 * Part of the Phrame
 *
 * @package    Codeception
 * @version    0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

namespace Phrame\Codeception;

use Phrame\Engine;

class Bootstrap
{
    /**
     * Loads and initializes extension
     * 
     * @param  Engine\Application  $application  Application object
     */
    public static function init($application = null)
    {
        $application = $application ?: Engine\Application::instance();

        include_once 'vendor/autoload.php';
    }

}
