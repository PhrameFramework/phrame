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

class Asset
{
    /**
     * Image asset
     * 
     * @param   string  $file_name  File name
     * @return  string
     */
    public static function img($file_name)
    {
        if ( ! is_file(PUBLIC_PATH.'/assets/img/'.$file_name) or filemtime(PUBLIC_PATH.'/assets/img/'.$file_name) != filemtime(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/themes/'.Application::instance()->theme.'/assets/img/'.$file_name))
        {
            copy(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/themes/'.Application::instance()->theme.'/assets/img/'.$file_name, PUBLIC_PATH.'/assets/img/'.$file_name);
            touch(PUBLIC_PATH.'/assets/img/'.$file_name, filemtime(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/themes/'.Application::instance()->theme.'/assets/img/'.$file_name));
        }

        return '<img src="'.Application::instance()->base_url.'/assets/img/'.$file_name.'" />';
    }

    /**
     * Style asset
     * 
     * @param   string  $file_name  File name
     * @return  string
     */
    public static function css($file_name)
    {
        if ( ! is_file(PUBLIC_PATH.'/assets/css/'.$file_name) or filemtime(PUBLIC_PATH.'/assets/css/'.$file_name) != filemtime(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/themes/'.Application::instance()->theme.'/assets/css/'.$file_name))
        {
            copy(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/themes/'.Application::instance()->theme.'/assets/css/'.$file_name, PUBLIC_PATH.'/assets/css/'.$file_name);
            touch(PUBLIC_PATH.'/assets/css/'.$file_name, filemtime(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/themes/'.Application::instance()->theme.'/assets/css/'.$file_name));
        }

        return '<link type="text/css" rel="stylesheet" href="'.Application::instance()->base_url.'/assets/css/'.$file_name.'" />';
    }

    /**
     * Script asset
     * 
     * @param   string  $file_name  File name
     * @return  string
     */
    public static function js($file_name)
    {
        if ( ! is_file(PUBLIC_PATH.'/assets/js/'.$file_name) or filemtime(PUBLIC_PATH.'/assets/js/'.$file_name) != filemtime(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/themes/'.Application::instance()->theme.'/assets/js/'.$file_name))
        {
            copy(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/themes/'.Application::instance()->theme.'/assets/js/'.$file_name, PUBLIC_PATH.'/assets/js/'.$file_name);
            touch(PUBLIC_PATH.'/assets/js/'.$file_name, filemtime(APPLICATIONS_PATH.'/'.APPLICATION_NAME.'/themes/'.Application::instance()->theme.'/assets/js/'.$file_name));
        }

        return '<script type="text/javascript" src="'.Application::instance()->base_url.'/assets/js/'.$file_name.'"></script>';
    }

}
