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

class Request
{
    /**
     * Server paraneters
     * 
     * @var  array
     */
    protected $server = array();

    /**
     * Get parameters
     * 
     * @var  array
     */
    protected $get = array();

    /**
     * Post parameters
     * @var  array
     */
    protected $post = array();

    /**
     * Constructs Request object
     */
    public function __construct()
    {
        $this->server  = $_SERVER;
        $this->get     = $_GET;
        $this->post    = $_POST;

        //TODO: filter
    }

    /**
     * Returns server parameter
     * 
     * @param   string  $name   Parameter name
     * @param   mixed   $value  New value
     * @return  string
     */
    public function server($name, $value = null)
    {
        if (isset($value))
        {
            $this->server[strtoupper($name)] = $value;
        }

        return isset($this->server[strtoupper($name)]) ? $this->server[strtoupper($name)] : null;
    }

    /**
     * Returns get parameter
     * 
     * @param   string  $name  Parameter name
     * @param   mixed   $value  New value
     * @return  string
     */
    public function get($name, $value = null)
    {
        if (isset($value))
        {
            $this->get[$name] = $value;
        }

        return isset($this->get[$name]) ? $this->get[$name] : null;
    }

    /**
     * Returns post parameter
     * 
     * @param   string  $name  Parameter name
     * @param   mixed   $value  New value
     * @return  string
     */
    public function post($name, $value = null)
    {
        if (isset($value))
        {
            $this->post[$name] = $value;
        }

        return isset($this->post[$name]) ? $this->post[$name] : null;
    }
    
}