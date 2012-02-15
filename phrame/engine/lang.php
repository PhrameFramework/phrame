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

class Lang
{
    /**
     * Singleton instances
     * 
     * @var  array
     */
    protected static $instance = array();

    /**
     * Application name
     * 
     * @var  string
     */
    protected $application_name;

    /**
     * Lang configuration
     * 
     * @var  array
     */
    protected $config = array();

    /**
     * Constructs Lang object
     */    
    public function __construct($application_name = null)
    {
        $this->application_name = $application_name ?: APPLICATION_NAME;

        // Process config files
        if (is_file(PHRAME_PATH.'/engine/config/lang.php'))
        {
            $this->config = array_merge($this->config, include PHRAME_PATH.'/engine/config/lang.php');
        }
        if (is_file(PHRAME_PATH.'/engine/config/'.APPLICATION_ENV.'/lang.php'))
        {
            $this->config = array_merge($this->config, include PHRAME_PATH.'/engine/config/'.APPLICATION_ENV.'/lang.php');
        }
        if (is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/config/lang.php'))
        {
            $this->config = array_merge($this->config, include APPLICATIONS_PATH.'/'.$this->application_name.'/config/lang.php');
        }
        if (is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/config/'.APPLICATION_ENV.'/lang.php'))
        {
            $this->config = array_merge($this->config, include APPLICATIONS_PATH.'/'.$this->application_name.'/config/'.APPLICATION_ENV.'/lang.php');
        }
    }

    /**
     * Returns singleton object
     *
     * @param   string  $application_name  Application name
     * @return  Lang
     */
    public static function instance($application_name = null)
    {
        $application_name = $application_name ?: APPLICATION_NAME;

        if ( ! isset(self::$instance[$application_name]))
        {
            self::$instance[$application_name] = new Lang($application_name);
        }
        return self::$instance[$application_name];
    }

    /**
     * Avoids singleton object cloning
     */
    protected function __clone(){}

    /**
     * Returns translated string
     * @param   string  $str  String
     * @return  string
     */
    public function get($str)
    {
        return isset($this->config[Application::instance($this->application_name)->language][$str]) ? $this->config[Application::instance($this->application_name)->language][$str] : $str;
    }

}
