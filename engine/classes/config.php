<?php
/**
 * Part of the Phramework.
 *
 * @package    Phramework
 * @version    0
 * @author     Phramework Development Team
 * @license    MIT License
 * @copyright  2012 Phramework Development Team
 * @link       http://p.tld
 */

class Config
{
    /**
     * Contains config array
     * 
     * @var  array
     */
    protected $config = array();

    /**
     * Constructs Config object
     */
    public function __construct()
    {
        $this->config = include APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/config/config.php';

        if (is_file(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/config/'.APPLICATION_ENV.'/config.php'))
        {
            $this->config = array_merge($this->config, include APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/config/'.APPLICATION_ENV.'/config.php');
        }

        //TODO: process other files
    }

    /**
     * Returns configuration option value
     * 
     * @param   string  $option_name  Option name
     * @return  mixed
     */
    public function __get($option_name)
    {
        return isset($this->config[$option_name]) ? $this->config[$option_name] : null;
    }

    /**
     * Sets configuration option value
     * 
     * @param   string  $option_name   Option name
     * @param   mixed   $option_value  Option value
     */
    public function __set($option_name, $option_value = null)
    {
        $this->config[$option_name] = $option_value;
    }

}
