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
     * Creates View object
     * 
     * @param  string  $view_name  View name
     * @param  array   $data       Data for view
     */
    public function __construct($view_name, $data = array())
    {
        $this->view_name  = $view_name;
        $this->data       = $data;
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
     * @return  string
     */
    public function render()
    {
        extract($this->data, EXTR_REFS);

        ob_start();
        include APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/themes/'.Application::instance()->theme.'/'.$this->view_name.'.php';
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
