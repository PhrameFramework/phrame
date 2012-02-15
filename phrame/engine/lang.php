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
     * @var  Config
     */
    protected $config = array();

    /**
     * Constructs Lang object
     */    
    public function __construct($application_name = null)
    {
        $this->application_name = $application_name ?: APPLICATION_NAME;

        $this->config = new Config('lang', $this->application_name);
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
        $language = Application::instance($this->application_name)->language;
        $translate = $this->config->$language;

        return isset($translate[$str]) ? $translate[$str] : $str;
    }

}
