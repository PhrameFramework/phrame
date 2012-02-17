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
    protected $headers = array();

    /**
     * Cookies
     * 
     * @var  array
     */
    protected $cookies = array();

    /**
     * Session
     * 
     * @var  array
     */
    protected $session = array();

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
        $this->session      = $this->application->request->session();
    }

    /**
     * Add header
     * 
     * @param  string  $header  Header
     */
    public function header($header)
    {
        $this->headers[] = $header;
    }

    /**
     * Add cookie
     * 
     * @param  string  $name      Cookie name
     * @param  string  $value     Cookie valuse
     * @param  int     $expire    Expire
     * @param  string  $path      Cookie path
     * @param  string  $domain    Cookie domain
     * @param  bool    $secure    Is the cookie secure?
     * @param  bool    $httponly  Is the cookie http only?
     */
    public function cookie($name, $value, $expire = null, $path = null, $domain = null, $secure = null, $httponly = null)
    {
        $this->cookies[$name] = array(
            'name'      => $name,
            'value'     => $value,
            'expire'    => $expire    ?: time() + 60 * 60,
            'path'      => $path      ?: '/',
            'domain'    => $domain    ?: parse_url($this->application->config->base_url, PHP_URL_HOST),
            'secure'    => $secure    ?: false,
            'httponly'  => $httponly  ?: false,
        );
    }

    /**
     * Add session parameter
     * 
     * @param  string  $name   Parameter name
     * @param  string  $value  Parameter value
     */
    public function session($name, $value)
    {
        $this->session[$name] = $value;
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

        // set session parameters
        $_SESSION = $this->session;

        // send cookies
        foreach ($this->cookies as $cookie)
        {
            setcookie(
                isset($cookie['name'])     ? $cookie['name']     : 'phrame',
                isset($cookie['value'])    ? $cookie['value']    : '',
                isset($cookie['expire'])   ? $cookie['expire']   : time() + 60 * 60,
                isset($cookie['path'])     ? $cookie['path']     : '/',
                isset($cookie['domain'])   ? $cookie['domain']   : parse_url($this->application->config->base_url, PHP_URL_HOST),
                isset($cookie['secure'])   ? $cookie['secure']   : false,
                isset($cookie['httponly']) ? $cookie['httponly'] : false
            );
        }

        // send headers
        foreach ($this->headers as $header)
        {
            header($header, false);
        }

        return $output;
    }

}
