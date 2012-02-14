<?php
/**
 * Part of the Phrame
 *
 * @package    Phrame
 * @version    0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

namespace Engine;

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
     * Routes
     * 
     * @var  array
     */
    protected $routes = array();

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

        // Process config/routes.php
        if (is_file(ENGINE_PATH.'/config/routes.php'))
        {
            $this->routes = array_merge($this->routes, include ENGINE_PATH.'/config/routes.php');
        }
        if (is_file(ENGINE_PATH.'/config/'.APPLICATION_ENV.'routes.php'))
        {
            $this->routes = array_merge($this->routes, include ENGINE_PATH.'/config/'.APPLICATION_ENV.'routes.php');
        }
        if (is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/config/routes.php'))
        {
            $this->routes = array_merge($this->routes, include APPLICATIONS_PATH.'/'.$this->application_name.'/config/routes.php');
        }
        if (is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/config/'.APPLICATION_ENV.'/routes.php'))
        {
            $this->routes = array_merge($this->routes, include APPLICATIONS_PATH.'/'.$this->application_name.'/config/'.APPLICATION_ENV.'/routes.php');
        }

        //TODO: use regexp to choose the appropriate route
        isset($this->routes['routes'][$request_uri]) and $request_uri = $this->routes['routes'][$request_uri];

        $path_info = explode('/', $request_uri);

        $this->controller  = ! empty($path_info[0]) ? $path_info[0] : $this->routes['default_controller'];
        $this->action      = ! empty($path_info[1]) ? $path_info[1] : 'index';

        unset($path_info[0]);
        unset($path_info[1]);
        $this->parameters  = $path_info;

        $routable = is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/controllers/'.strtolower($this->controller).'.php');

        if ( ! $routable)
        {
            $this->controller  = Application::instance($this->application_name)->default_controller;
            $this->action      = '';
        }

        $this->controller  = strtolower($this->controller);
        $this->action      = strtolower($this->action);

        Application::instance($this->application_name)->controller  = $this->controller;
        Application::instance($this->application_name)->action      = $this->action;
    }

}
