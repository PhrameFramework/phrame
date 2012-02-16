<?php
/**
 * Part of the Phrame
 *
 * @package    Engine
 * @version    0
 * @author     Phrame Development Team
 * @license    MIT License
 * @copyright  2012 Phrame Development Team
 * @link       http://phrame.itworks.in.ua/
 */

namespace Phrame\Engine;

class Asset
{
    /**
     * Singleton instances
     * 
     * @var  array
     */
    protected static $instance = array();

    /**
     * Application name
     * 
     * @var  string
     */
    protected $application_name;

    /**
     * Asset configuration
     * 
     * @var  Config
     */
    protected $config = null;

    /**
     * Constructs Asset object
     */    
    public function __construct($application_name = null)
    {
        $this->application_name = $application_name ?: APPLICATION_NAME;

        $this->config = new Config('asset', $this->application_name);
    }

    /**
     * Returns singleton object
     *
     * @param   string  $application_name  Application name
     * @return  Lang
     */
    public static function instance($application_name = null)
    {
        $application_name = $application_name ?: APPLICATION_NAME;

        if ( ! isset(self::$instance[$application_name]))
        {
            self::$instance[$application_name] = new Asset($application_name);
        }
        return self::$instance[$application_name];
    }

    /**
     * Avoids singleton object cloning
     */
    protected function __clone(){}

    /**
     * Renders tags
     * 
     * @param   string  $file_name   Asset file name
     * @param   string  $asset_type  Asset type (img|css|js)
     * @param   array   $attributes  Tag attributes
     * @return  string
     */
    public function render_asset($file_name, $asset_type, $attributes = array())
    {
        $theme_file   = APPLICATIONS_PATH.'/'.$this->application_name.'/themes/'.Application::instance($this->application_name)->theme.'/assets/'.$asset_type.'/'.$file_name;
        $public_file  = PUBLIC_PATH.'/assets/'.$asset_type.'/'.$file_name;

        if ( ! is_file($public_file) or filemtime($public_file) != filemtime($theme_file))
        {
            copy($theme_file, $public_file);
            touch($public_file, filemtime($theme_file));
        }

        if ($this->config->append_timestamp === true)
        {
            $file_name .= '?'.filemtime($public_file);
        }

        $attr = '';
        foreach($attributes as $name => $value)
        {
            $attr .= $name.'="'.$value.'" ';
        }


        $html = '';

        switch ($asset_type)
        {
            case ('img'):
            {
                $html = '<img src="'.Application::instance($this->application_name)->base_url.'/assets/img/'.$file_name.'" '.$attr.'/>';
                break;
            }
            case ('css'):
            {
                $html = '<link type="text/css" rel="stylesheet" href="'.Application::instance($this->application_name)->base_url.'/assets/css/'.$file_name.'" '.$attr.'/>';
                break;
            }
            case ('js'):
            {
                $html = '<script type="text/javascript" src="'.Application::instance($this->application_name)->base_url.'/assets/js/'.$file_name.'" '.$attr.'></script>';
                break;
            }
        }

        return $html;
    }

    /**
     * Image asset
     * 
     * @param   string  $file_name   File name
     * @param   array   $attributes  Tag attributes
     * @return  string
     */
    public function img($file_name, $attributes = array())
    {
        return $this->render_asset($file_name, 'img', $attributes);
    }

    /**
     * Style asset
     * 
     * @param   string  $file_name   File name
     * @param   array   $attributes  Tag attributes
     * @return  string
     */
    public function css($file_name, $attributes = array())
    {
        return $this->render_asset($file_name, 'css', $attributes);
    }

    /**
     * Script asset
     * 
     * @param   string  $file_name   File name
     * @param   array   $attributes  Tag attributes
     * @return  string
     */
    public function js($file_name, $attributes = array())
    {
        return $this->render_asset($file_name, 'js', $attributes);
    }

}
