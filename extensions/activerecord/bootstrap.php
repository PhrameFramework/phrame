<?php

namespace Extensions\Activerecord;

class Bootstrap
{
    /**
     * Loads and initializes extension
     * @param   string  $application_name  Application name
     */
    public static function init($application_name)
    {
        include_once 'classes/ActiveRecord.php';

        $config = array();

        if (is_file('config/activerecord.php'))
        {
            $config = array_merge($config, include 'config/activerecord.php');
        }
        if (is_file('config/'.APPLICATION_ENV.'/activerecord.php'))
        {
            $config = array_merge($config, include 'config/'.APPLICATION_ENV.'/activerecord.php');
        }
        if (is_file(ENGINE_PATH.'/config/activerecord.php'))
        {
            $config = array_merge($config, include ENGINE_PATH.'/config/activerecord.php');
        }
        if (is_file(ENGINE_PATH.'/config/'.APPLICATION_ENV.'/activerecord.php'))
        {
            $config = array_merge($config, include ENGINE_PATH.'/config/'.APPLICATION_ENV.'/activerecord.php');
        }
        if (is_file(APPLICATIONS_PATH.'/'.$application_name.'/config/activerecord.php'))
        {
            $config = array_merge($config, include APPLICATIONS_PATH.'/'.$application_name.'/config/activerecord.php');
        }
        if (is_file(APPLICATIONS_PATH.'/'.$application_name.'/config/'.APPLICATION_ENV.'/activerecord.php'))
        {
            $config = array_merge($config, include APPLICATIONS_PATH.'/'.$application_name.'/config/'.APPLICATION_ENV.'/activerecord.php');
        }

        if ( ! empty($config) and ! empty($config['connection']))
        {
            $cfg = \ActiveRecord\Config::instance();
            $cfg->set_model_directory(APPLICATIONS_PATH.'/'.$application_name.'/models');
            $cfg->set_connections(
                array(
                    'development' => $config['connection']
                )
            );
        }        
    }

}
