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

class View
{
    /**
     * View name
     * 
     * @var  string
     */
    protected $view_name = null;

    /**
     * Data for view
     * 
     * @var  array
     */
    protected $data = array();

    /**
     * Application name
     * 
     * @var  string
     */
    protected $application_name;

    /**
     * Creates View object
     * 
     * @param  string  $view_name  View name
     * @param  array   $data       Data for view
     */
    public function __construct($view_name, $data = array(), $application_name = null)
    {
        $this->view_name         = $view_name;
        $this->data              = $data;
        $this->application_name  = $application_name ?: APPLICATION_NAME;
    }

    /**
     * Sets data for view
     * 
     * @param  string  $name   Data name
     * @param  string  $value  Data value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * Renders view
     * 
     * @param   string  $application_name  Application name
     * @return  string
     */
    public function render()
    {
        extract($this->data, EXTR_REFS);

        ob_start();
        if (is_file(APPLICATIONS_PATH.'/'.$this->application_name.'/themes/'.Application::instance($this->application_name)->theme.'/'.$this->view_name.'.php'))
        {
            include APPLICATIONS_PATH.'/'.$this->application_name.'/themes/'.Application::instance($this->application_name)->theme.'/'.$this->view_name.'.php';
        }
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    /**
     * Converts view to string
     * 
     * @return  string
     */
    public function __toString()
    {
        return $this->render();
    }

}
