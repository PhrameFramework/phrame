<?php
/**
 * Part of the Phramework.
 *
 * @package    Phramework
 * @version    0
 * @author     Phramework Development Team
 * @license    MIT License
 * @copyright  2012 Phramework Development Team
 * @link       http://phramework.itworks.in.ua/
 */

namespace Engine;

class Response
{
    /**
     * Request object
     * 
     * @var  Request
     */
    protected $request = null;

    /**
     * Application name
     * 
     * @var  string
     */
    protected $application_name = null;

    /**
     * Constructs Response object
     * 
     * @param  Request  $request  Request object
     */
    public function __construct($request, $application_name = null)
    {
        $this->request = $request;

        $this->application_name = $application_name ?: APPLICATION_NAME;
    }

    /**
     * Renders response
     * 
     * @return  string
     */
    public function render()
    {
        $route = new Route($this->request);

        $controller_name  = ucfirst($this->application_name).'\\Controller_'.ucfirst($route->controller);
        $controller       = new $controller_name();
        $action           = $route->action;
        $parameters       = $route->parameters;

        ob_start();
        call_user_func(array($controller, $action), $parameters);
        $controller->$action($parameters);
        echo $controller->template->render();
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

}
