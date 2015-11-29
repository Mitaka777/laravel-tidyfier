<?php namespace Roumen\Tidyfier;

/**
 * Tidyfier class for laravel-tidyfier package.
 *
 * @author Roumen Damianoff <roumen@dawebs.com>
 * @version 1.1.2
 * @link http://roumen.it/projects/laravel-tidyfier
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

class Tidyfier
{

    protected static $encoding = 'utf8';
    protected static $doctype = '<!DOCTYPE html>';
    protected static $config = [
                                'indent'                => 2,
                                'indent-spaces'         => 4,
                                'wrap'                  => 200,
                                'doctype'               => 'omit',
                                'ajax'                  => false,
                                'new-blocklevel-tags'   => 'article,aside,canvas,dialog,embed,figcaption,figure,footer,header,hgroup,nav,output,progress,section,video',
                                'new-inline-tags'       => 'audio,bdi,command,datagrid,datalist,details,keygen,mark,meter,rp,rt,ruby,source,summary,time,track,wbr',
                               ];


    public static function setConfig($config = [])
    {
        static::$config = $config;
    }


    public static function getConfig()
    {
        return static::$config;
    }


    public static function setDoctype($doctype = '')
    {
        static::$doctype = $doctype;
    }


    public static function getDoctype()
    {
        return static::$doctype;
    }


    // code, doctype, encoding, config
    public static function tidyfy($code = '', $doctype = null, $encoding = null, $config = null)
    {
        if (!$config) $config = static::$config;
        if (!$encoding) $encoding = static::$encoding;
        if ($doctype === null) $doctype = static::$doctype;

        $tidy = new \tidy;
        $tidy->parseString($code, $config, $encoding);
        $tidy->cleanRepair();

        ($doctype == '') ? $output = $tidy->value : $output = $doctype . "\r\n" . $tidy->value;

        return $output;
    }

}
