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

class Route
{
    /**
     * Controller
     * 
     * @var  string
     */
    public $controller;

    /**
     * Action
     * 
     * @var  string
     */
    public $action;

    /**
     * Parameters
     * 
     * @var  array
     */
    public $parameters;

    /**
     * Routing config
     * 
     * @var  array
     */
    protected $config = array();

    /**
     * Application name
     * 
     * @var  string
     */
    protected $application_name;

    /**
     * Creates Route object
     * 
     * @param   Request  $request           Request object
     * @param   string   $application_name  Application name
     */
    public function __construct($request, $application_name = null)
    {
        $this->application_name = $application_name ?: APPLICATION_NAME;

        // Process request_uri if default application is called
        $request_uri = $this->application_name === APPLICATION_NAME ? trim($request->server('request_uri'), '/') : '';

        // Process config files
        if (is_file(PHRAME_PATH.'/engine/config/route.php'))
        {
            $this->config = array_merge($this->config, include PHRAME_PATH.'/engine/config/route.php');
        }
        if (is_file(PHRAME_PATH.'/engine/config/'.APPLICATION_ENV.'route.php'))
        {
            $this->config = array_merge($this->config, include PHRAME_PATH.'/engine/config/'.APPLICATION_ENV.'route.php');
        }
        if (is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/config/route.php'))
        {
            $this->config = array_merge($this->config, include APPLICATIONS_PATH.'/'.$this->application_name.'/config/route.php');
        }
        if (is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/config/'.APPLICATION_ENV.'/route.php'))
        {
            $this->config = array_merge($this->config, include APPLICATIONS_PATH.'/'.$this->application_name.'/config/'.APPLICATION_ENV.'/route.php');
        }

        //TODO: use regexp to choose the appropriate route
        isset($this->config['routes'][$request_uri]) and $request_uri = $this->config['routes'][$request_uri];

        $path_info = explode('/', $request_uri);

        $this->controller  = ! empty($path_info[0]) ? $path_info[0] : $this->config['default_controller'];
        $this->action      = ! empty($path_info[1]) ? $path_info[1] : 'index';

        unset($path_info[0]);
        unset($path_info[1]);
        $this->parameters  = $path_info;

        $routable = is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/controllers/'.strtolower($this->controller).'.php');

        if ( ! $routable)
        {
            $this->controller  = $this->config['default_controller'];
            $this->action      = '';
        }

        $this->controller  = strtolower($this->controller);
        $this->action      = strtolower($this->action);

        Application::instance($this->application_name)->controller  = $this->controller;
        Application::instance($this->application_name)->action      = $this->action;
    }

}
