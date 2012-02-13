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

require_once ENGINE_PATH.'/classes/autoloader.php';

spl_autoload_register('Engine\\Autoloader::load');
