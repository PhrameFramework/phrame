<?php
/**
 * Part of the Phrame
 *
 * @package    Activerecord
 * @version    0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

namespace Packages\Activerecord;

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

        include_once 'vendor/ActiveRecord.php';

        $config = new Phrame\Config('activerecord', $application, 'activerecord');
        $connection_string = $config->connection;

        if ( ! empty($connection_string))
        {
            $cfg = \ActiveRecord\Config::instance();
            $cfg->set_model_directory(APPLICATIONS_PATH.'/'.$application->name.'/models');
            $cfg->set_connections(
                array(
                    'development' => $connection_string
                )
            );
        }        
    }

}
