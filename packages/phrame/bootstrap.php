<?php
/**
 * Part of the Phrame
 *
 * @package    Phrame
 * @version    0.0.0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

namespace Packages\Phrame;

class Bootstrap
{
    /**
     * Loads and initializes package
     * 
     * @param  Phrame\Application  $application  Application object
     */
    public static function init($application = null)
    {
        $application = $application ?: Application::instance();

        $application->run();
    }

}
