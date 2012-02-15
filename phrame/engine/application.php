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

class Application
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
     * Application configuration
     * 
     * @var  Config
     */
    protected $config = null;

    /**
     * Application constructor (protected)
     *
     * @param  string  $application_name  Application name
     */
    protected function __construct($application_name = null)
    {
        $this->application_name = $application_name ?: APPLICATION_NAME;

        $this->config = new Config('application', $this->application_name);

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
        $this->config->base_url = $base_url;

        // Error reporting
        if ($this->application_name === APPLICATION_NAME)
        {
            error_reporting($this->config->error_reporting);
            ini_set('display_errors', $this->config->display_errors);
        }

        // Load extensions
        foreach ($this->config->extensions as $extension)
        {
            call_user_func('\\Phrame\\'.ucfirst(strtolower($extension)).'\\Bootstrap::init', $this->application_name);
        }
    }

    /**
     * Returns singleton object
     *
     * @param   string  $application_name  Application name
     * @return  Application
     */
    public static function instance($application_name = null)
    {
        $application_name = $application_name ?: APPLICATION_NAME;

        if ( ! isset(self::$instance[$application_name]))
        {
            self::$instance[$application_name] = new Application($application_name);
        }
        return self::$instance[$application_name];
    }

    /**
     * Avoids singleton object cloning
     */
    protected function __clone(){}

    /**
     * Returns application configuration option
     * 
     * @param   string  $name  Option name
     * @return  mixed
     */
    public function __get($name)
    {
        return $this->config->$name;
    }

    /**
     * Sets application configuration option
     * 
     * @param   string  $name   Option name
     * @param   mixed   $value  Option value
     */
    public function __set($name, $value)
    {
        $this->config->$name = $value;
    }

    /**
     * Process request
     * 
     * @param   Request   $request   Request to process
     * @return  Response
     */
    public function process($request = null)
    {
        $request = $request ?: new Request();

        $response = new Response($request, $this->application_name);

        return $response;
    }

    /**
     * Process default request and renders response
     */
    public function run()
    {
        echo $this->process()->render();
    }
}
