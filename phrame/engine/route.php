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
     * Application object
     * 
     * @var  Application
     */
    protected $application = null;

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
     * @var  Config
     */
    protected $config = null;

    /**
     * Creates Route object
     * 
     * @param   Request      $request      Request object
     * @param   Application  $application  Application object
     */
    public function __construct($request, $application = null)
    {
        $this->application = $application ?: Application::instance();

        // Process request_uri if default application is called
        $request_uri = $this->application->name === APPLICATION_NAME ? trim($request->server('request_uri'), '/') : '';

        $this->config = new Config('route', $this->application);

        // use regexp to choose the appropriate route
        foreach ($this->config->routes as $old_route => $new_route)
        {
            if (preg_match('#'.$old_route.'#', $request_uri) > 0)
            {
                $request_uri = preg_replace('#'.$old_route.'#', $new_route, $request_uri);
                break;
            }
        }

        $path_info = explode('/', $request_uri);

        $this->controller  = ! empty($path_info[0]) ? $path_info[0] : $this->config->default_controller;
        $this->action      = ! empty($path_info[1]) ? $path_info[1] : 'index';

        unset($path_info[0]);
        unset($path_info[1]);
        $this->parameters  = $path_info;

        $routable = is_file(APPLICATIONS_PATH.'/'.$this->application->name.'/controllers/'.strtolower($this->controller).'.php');

        if ( ! $routable)
        {
            $this->controller  = $this->config->default_controller;
            $this->action      = '';
        }

        $this->controller  = strtolower($this->controller);
        $this->action      = strtolower($this->action);
    }

}
