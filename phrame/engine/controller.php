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
     * Application name
     * 
     * @var  string
     */
    protected $application_name;

    /**
     * Template view object
     * 
     * @var  View
     */
    public $template;

    /**
     * Constructs Controller object
     * 
     * @param  string  $application_name  Application name
     */
    public function __construct($application_name = null)
    {
        $this->application_name = $application_name ?: APPLICATION_NAME;
    }

    /**
     * Page-not-found handler
     *
     * @param  string  $method
     * @param  array   $parameters
     */
    public function __call($method, $parameters)
    {
        if (isset($_SERVER['FCGI_SERVER_VERSION']))
        {
            header('Status: 404 Not Found');
        }
        else
        {
            // determime protocol
            $protocol = $_SERVER['SERVER_PROTOCOL'] ?: 'HTTP/1.1';
            header($protocol.' 404 Not Found');
        }
        
        $this->template->content = '404';
    }

}
