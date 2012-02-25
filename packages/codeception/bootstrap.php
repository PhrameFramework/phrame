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

namespace Packages\Codeception;

use Packages\Phrame;

class Bootstrap
{
    /**
     * Loads and initializes extension
     * 
     * @param  Phrame\Application  $application  Application object
     */
    public static function init($application = null)
    {
        $application = $application ?: Phrame\Application::instance();

        include_once 'vendor/autoload.php';
    }

}
