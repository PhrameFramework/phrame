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

class Response
{
    /**
     * Request object
     * 
     * @var  Request
     */
    protected $request = null;

    /**
     * Constructs Response object
     * 
     * @param  Request  $request  Request object
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Renders response
     * 
     * @return  string
     */
    public function render()
    {
        $route = new Route($this->request);

        $controller_name  = ucfirst($route->controller);
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
