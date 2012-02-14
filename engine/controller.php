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
     */
    public function __construct($application_name = null)
    {
        $this->application_name = $application_name ?: APPLICATION_NAME;
    }

    /**
     * Page-not-found handler
     *
     * @param string $method
     * @param array $parameters
     */
    public function __call($method, $parameters)
    {
        $this->template->content = '404';
    }

}
