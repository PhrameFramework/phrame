<?php
/**
 * Part of the Phramework.
 *
 * @package    Phramework
 * @version    0
 * @author     Phramework Development Team
 * @license    MIT License
 * @copyright  2012 Phramework Development Team
 * @link       http://p.tld
 */

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
     * @param   string  $name  Parameter name
     * @return  string
     */
    public function server($name)
    {
        return isset($this->server[strtoupper($name)]) ? $this->server[strtoupper($name)] : null;
    }

    /**
     * Returns get parameter
     * 
     * @param   string  $name  Parameter name
     * @return  string
     */
    public function get($name)
    {
        return isset($this->get[$name]) ? $this->get[$name] : null;
    }

    /**
     * Returns post parameter
     * 
     * @param   string  $name  Parameter name
     * @return  string
     */
    public function post($name)
    {
        return isset($this->post[$name]) ? $this->post[$name] : null;
    }
    
}
