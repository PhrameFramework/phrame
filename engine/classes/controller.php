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

    public function page_not_found()
    {
        $this->template->content = '404';
    }
}
