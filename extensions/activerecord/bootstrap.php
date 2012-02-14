<?php

function activerecord_load($application_name)
{
    include_once 'php-activerecord/ActiveRecord.php';

    $config = array();

    if (is_file(APPLICATIONS_PATH.'/'.$application_name.'/config/db.php'))
    {
        $config = array_merge($config, include APPLICATIONS_PATH.'/'.$application_name.'/config/db.php');
    }
    if (is_file(APPLICATIONS_PATH.'/'.$application_name.'/config/'.APPLICATION_ENV.'/db.php'))
    {
        $config = array_merge($config, include APPLICATIONS_PATH.'/'.$application_name.'/config/'.APPLICATION_ENV.'/db.php');
    }

    if ( ! empty($config) and ! empty($config['connection']))
    {
        $cfg = ActiveRecord\Config::instance();
        $cfg->set_model_directory(APPLICATIONS_PATH.'/'.$application_name.'/classes/model');
        $cfg->set_connections(
            array(
                'development' => $config['connection']
            )
        );
    }
}
