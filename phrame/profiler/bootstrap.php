<?php
/**
 * Part of the Phrame
 *
 * @package    Profiler
 * @version    0.0.0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

namespace Phrame\Profiler;

use Phrame\Core;

class Bootstrap
{
    /**
     * Loads and initializes extension
     * 
     * @param  Core\Application  $application  Application object
     */
    public static function init($application = null)
    {
        $application = $application ?: Core\Application::instance();

        require_once 'vendor/classes/PhpQuickProfiler.php';
    }

}
