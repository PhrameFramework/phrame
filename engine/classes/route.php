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
     * Creates Route object
     * 
     * @param   Request  $request  Request object
     */
    public function __construct($request)
    {
        $path_info = explode('/', trim($request->server('request_uri'), '/'));

        $this->controller  =  ! empty($path_info[0]) ? $path_info[0] : Application::instance()->default_controller;
        $this->action      =  ! empty($path_info[1]) ? $path_info[1] : 'index';

        //TODO: process config/routes.php

        $routable = is_file(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/classes/controller/'.strtolower($this->controller).'.php');

        if ( ! $routable)
        {
            $this->controller  = Application::instance()->default_controller;
            $this->action      = 'page_not_found';
        }

        $this->controller  = strtolower($this->controller);
        $this->action      = strtolower($this->action);

        Application::instance()->controller  = $this->controller;
        Application::instance()->action      = $this->action;
    }

}
