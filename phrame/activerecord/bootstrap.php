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

namespace Phrame\Activerecord;

use Phrame\Engine;

class Bootstrap
{
    /**
     * Loads and initializes extension
     * @param   string  $application_name  Application name
     */
    public static function init($application_name)
    {
        include_once 'classes/ActiveRecord.php';

        $config = new Engine\Config('activerecord', $application_name, 'activerecord');
        $connection_string = $config->connection;

        if ( ! empty($connection_string))
        {
            $cfg = \ActiveRecord\Config::instance();
            $cfg->set_model_directory(APPLICATIONS_PATH.'/'.$application_name.'/models');
            $cfg->set_connections(
                array(
                    'development' => $connection_string
                )
            );
        }        
    }

}
