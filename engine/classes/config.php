<?php
/**
 * Part of the Phramework.
 *
 * @package    Phramework
 * @version    0
 * @author     Phramework Development Team
 * @license    MIT License
 * @copyright  2012 Phramework Development Team
 * @link       http://phramework.itworks.in.ua/
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
        // set base_url
        $base_url = '';
        if ($_SERVER['HTTP_HOST'])
        {
            $base_url .= 'http';
            if ((isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off') or ( ! isset($_SERVER['HTTPS']) and $_SERVER['SERVER_PORT'] == 443))
            {
                $base_url .= 's';
            }
            $base_url .= '://'.$_SERVER['HTTP_HOST'];
        }
        if ($_SERVER['SCRIPT_NAME'])
        {
            $base_url .= str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
            $base_url = rtrim($base_url, '/');
        }
        $this->config['base_url'] = $base_url;

        // Process config files
        if (is_file(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/config/config.php'))
        {
            $this->config = array_merge($this->config, include APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/config/config.php');
        }
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
