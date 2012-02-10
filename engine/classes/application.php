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

class Application
{
    /**
     * Singleton instances
     * 
     * @var  array
     */
    protected static $instance = array();

    /**
     * Application configuration
     * 
     * @var  Config
     */
    protected $config = null;

    /**
     * Application constructor (protected)
     */
    protected function __construct()
    {
        $this->config = new Config();

        // Error reporting
        error_reporting($this->config->error_reporting);
        ini_set('display_errors', $this->config->display_errors);

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
    }

    /**
     * Returns singleton object
     * 
     * @param   string       $application_name  Application name
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

        $response = new Response($request);

        return $response;
    }

}
