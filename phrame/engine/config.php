<?php
/**
 * Part of the Phrame
 *
 * @package    Engine
 * @version    0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

namespace Phrame\Engine;

class Config
{
    /**
     * Configuration name
     * 
     * @var  string
     */
    protected $config_name;

    /**
     * Application name
     * 
     * @var  string
     */
    protected $application_name;

    /**
     * Package name
     * 
     * @var  string
     */
    protected $package;

    /**
     * Configuration array
     * 
     * @var  array
     */
    protected $config = array();

    /**
     * Contsructs Config object
     * 
     * @param  string  $config_name       Configuration name
     * @param  string  $application_name  Application name
     * @param  string  $package           Package name
     */
    public function __construct($config_name = null, $application_name = null, $package = 'engine')
    {
        $this->config_name       = $config_name ?: 'application';
        $this->application_name  = $application_name ?: APPLICATION_NAME;
        $this->package           = $package ?: 'engine';

        $this->config = array();

        // Process config files

        if (is_file(PHRAME_PATH.'/'.$this->package.'/config/'.$this->config_name.'.php'))
        {
            $this->config = array_merge(
                $this->config,
                include PHRAME_PATH.'/'.$this->package.'/config/'.$this->config_name.'.php'
            );
        }
        if (is_file(PHRAME_PATH.'/'.$this->package.'/config/'.APPLICATION_ENV.'/'.$this->config_name.'.php'))
        {
            $this->config = array_merge(
                $this->config,
                include PHRAME_PATH.'/'.$this->package.'/config/'.APPLICATION_ENV.'/'.$this->config_name.'.php'
            );
        }

        if (is_file(PHRAME_PATH.'/engine/config/'.$this->config_name.'.php'))
        {
            $this->config = array_merge(
                $this->config,
                include PHRAME_PATH.'/engine/config/'.$this->config_name.'.php'
            );
        }
        if (is_file(PHRAME_PATH.'/engine/config/'.APPLICATION_ENV.'/'.$this->config_name.'.php'))
        {
            $this->config = array_merge(
                $this->config,
                include PHRAME_PATH.'/engine/config/'.APPLICATION_ENV.'/'.$this->config_name.'.php'
            );
        }

        if (is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/config/'.$this->config_name.'.php'))
        {
            $this->config = array_merge(
                $this->config,
                include APPLICATIONS_PATH.'/'.$this->application_name.'/config/'.$this->config_name.'.php'
            );
        }
        if (is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/config/'.APPLICATION_ENV.'/'.$this->config_name.'.php'))
        {
            $this->config = array_merge(
                $this->config,
                include APPLICATIONS_PATH.'/'.$this->application_name.'/config/'.APPLICATION_ENV.'/'.$this->config_name.'.php'
            );
        }
    }

    /**
     * Returns configuration option
     * 
     * @param   string  $name  Option name
     * @return  mixed
     */
    public function __get($name)
    {
        return isset($this->config[$name]) ? $this->config[$name] : null;
    }

    /**
     * Sets configuration option
     * 
     * @param   string  $name   Option name
     * @param   mixed   $value  Option value
     */
    public function __set($name, $value)
    {
        $this->config[$name] = $value;
    }

}
