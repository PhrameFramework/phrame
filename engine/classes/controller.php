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

class Controller
{
    /**
     * Template view object
     * 
     * @var  View
     */
    public $template;

    /**
     * Constructs Controller object
     */
    public function __construct()
    {
        $this->template = new View('template');
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
