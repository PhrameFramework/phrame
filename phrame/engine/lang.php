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
    protected $config = null;

    /**
     * Application language
     * 
     * @var  string
     */
    protected $language;

    /**
     * Default application language
     * 
     * @var  string
     */
    protected $default_language;

    /**
     * Translations
     * 
     * @var  string
     */
    protected $translations;

    /**
     * Default translations
     * 
     * @var  string
     */
    protected $default_translations;

    /**
     * Constructs Lang object
     * 
     * @param  string  $application_name  Application name
     */    
    protected function __construct($application_name = null)
    {
        $this->application_name = $application_name ?: APPLICATION_NAME;

        $this->config = new Config('lang', $this->application_name);

        $this->language              = $this->config->language === 'auto' ? strtolower(substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2)) : $this->config->language;
        $this->default_language      = $this->config->default_language;
        $this->translations          = isset($this->config->languages[$this->language]) ? $this->config->languages[$this->language] : array();
        $this->default_translations  = isset($this->config->languages[$this->default_language]) ? $this->config->languages[$this->default_language] : array();
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
     * 
     * @param   string  $str  String
     * @return  string
     */
    public function get($str)
    {
        return isset($this->translations[$str]) ? $this->translations[$str] : (isset($this->default_translations[$str]) ? $this->default_translations[$str] : $str);
    }

}
