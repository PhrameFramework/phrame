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

        $path_info = array();

        // Process request_uri if default application is called
        if ($this->application_name === APPLICATION_NAME)
        {
            $path_info = explode('/', trim($request->server('request_uri'), '/'));
        }

        $this->controller  = ! empty($path_info[0]) ? $path_info[0] : Application::instance($this->application_name)->default_controller;
        $this->action      = ! empty($path_info[1]) ? $path_info[1] : 'index';
        
        unset($path_info[0]);
        unset($path_info[1]);
        $this->parameters  = $path_info;

        //TODO: process config/routes.php

        $routable = is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/classes/controller/'.strtolower($this->controller).'.php');

        if ( ! $routable)
        {
            $this->controller  = Application::instance($this->application_name)->default_controller;
            $this->action      = 'page_not_found';
        }

        $this->controller  = strtolower($this->controller);
        $this->action      = strtolower($this->action);

        Application::instance($this->application_name)->controller  = $this->controller;
        Application::instance($this->application_name)->action      = $this->action;
    }

}
