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
     * @var  Application
     */
    protected static $instance = null;

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
    }

    /**
     * Returns singleton object
     * 
     * @return  Application
     */
    public static function instance()
    {
        if ( ! isset(self::$instance))
        {
            self::$instance = new Application();
        }
        return self::$instance;
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

    /**
     * Process default request and renders response
     */
    public function run()
    {
        echo $this->process()->render();
    }
}
