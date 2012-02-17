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

class Response
{
    /**
     * Application object
     * 
     * @var  Application
     */
    protected $application = null;

    /**
     * Route object
     * 
     * @var  Route
     */
    protected $route = null;

    /**
     * Headers
     * 
     * @var  array  Response headers
     */
    public $headers = array();

    /**
     * Cookies
     * 
     * @var  array
     */
    public $cookies = array();

    /**
     * Constructs Response object
     * 
     * @param  Route        $route        Route object
     * @param  Application  $application  Application object
     */
    public function __construct($route, $application = null)
    {
        $this->route        = $route;
        $this->application  = $application ?: Application::instance(APPLICATION_NAME);
    }

    /**
     * Renders response
     * 
     * @return  string
     */
    public function render()
    {
        $controller_name  = 'Applications\\'.ucfirst($this->application->name).'\\Controllers\\'.ucfirst($this->route->controller);
        $controller       = new $controller_name($this->application);
        $action           = $this->route->action;
        $parameters       = $this->route->parameters;

        ob_start();
        if ( ! isset($controller->template))
        {
            $controller->template = new View('template', array(), $this->application);
        }
        call_user_func_array(array($controller, $action), $parameters);
        echo $controller->template->render();
        $output = ob_get_contents();
        ob_end_clean();

        // send cookies
        foreach ($this->cookies as $cookie)
        {
            $name      = isset($cookie['name'])     ? $cookie['name']     : 'phrame';
            $value     = isset($cookie['value'])    ? $cookie['value']    : '';
            $expire    = isset($cookie['expire'])   ? $cookie['expire']   : time() + 60 * 60;
            $path      = isset($cookie['path'])     ? $cookie['path']     : '/';
            $domain    = isset($cookie['domain'])   ? $cookie['domain']   : parse_url($this->application->config->base_url, PHP_URL_HOST);
            $secure    = isset($cookie['secure'])   ? $cookie['secure']   : false;
            $httponly  = isset($cookie['httponly']) ? $cookie['httponly'] : false;

            setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
        }

        // send headers
        foreach ($this->headers as $header)
        {
            header($header, false);
        }

        return $output;
    }

}
