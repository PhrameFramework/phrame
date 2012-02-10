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
     * Singleton instance
     * 
     * @var  Application
     */
    protected static $instance = null;

    /**
     * Application configuration
     * 
     * @var  array
     */
    protected $config = null;

    /**
     * Request to process
     * 
     * @var  Request
     */
    protected $request = null;

    /**
     * Response to return
     * 
     * @var  Response
     */
    protected $response = null;

    /**
     * Application constructor (protected)
     * 
     * @param  Request  $request  Request object
     */
    protected function __construct($request = null)
    {
        $this->config = new Config();

        $this->request = isset($request) ? $request : new Request();

        // Error reporting
        error_reporting($this->config->error_reporting);
        ini_set('display_errors', $this->config->display_errors);

        // set base_url
        $base_url = '';
        if($this->request->server('http_host'))
        {
            $base_url .= 'http';
            if (($this->request->server('HTTPS') !== null and $this->request->server('HTTPS') != 'off') or ($this->request->server('HTTPS') === null and $this->request->server('SERVER_PORT') == 443))
            {
                $base_url .= 's';
            }
            $base_url .= '://'.$this->request->server('http_host');
        }
        if ($this->request->server('script_name'))
        {
            $base_url .= str_replace('\\', '/', dirname($this->request->server('script_name')));
            $base_url = rtrim($base_url, '/');
        }
        $this->config->base_url = $base_url;
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
     */
    public function run()
    {
        $this->response = new Response($this->request);

        echo $this->response->render();
    }

}
