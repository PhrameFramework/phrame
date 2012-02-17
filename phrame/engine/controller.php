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

class Controller
{
    /**
     * Application object
     * 
     * @var  Application
     */
    protected $application = null;

    /**
     * Template view object
     * 
     * @var  View
     */
    public $template = null;

    /**
     * Constructs Controller object
     * 
     * @param  Application  $application  Application object
     */
    public function __construct($application = null)
    {
        $this->application = $application ?: Application::instance();
    }

    /**
     * Page-not-found handler
     *
     * @param  string  $method
     * @param  array   $parameters
     */
    public function __call($method, $parameters)
    {
        if ($this->application->request->server('fcgi_server_version'))
        {
            $this->application->response->headers[] = 'Status: 404 Not Found';
        }
        else
        {
            $this->application->response->headers[] = $this->application->request->protocol().' 404 Not Found';
        }
        
        $this->template->content = '404';
    }

}
