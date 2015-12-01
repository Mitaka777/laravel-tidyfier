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
                                'newline'               => 'LF',
                                'indent'                => 2,
                                'indent-spaces'         => 4,
                                'wrap'                  => 200,
                                'doctype'               => 'omit',
                                'new-blocklevel-tags'   => 'article,aside,canvas,dialog,embed,figcaption,figure,footer,header,hgroup,nav,output,progress,section,video',
                                'new-inline-tags'       => 'audio,bdi,command,datagrid,datalist,details,keygen,mark,meter,rp,rt,ruby,source,summary,time,track,wbr',
                               ];


    /**
     * Set config options
     *
     * @return void
    */
    public static function setConfig($config = [])
    {
        static::$config = $config;
    }


    /**
     * Get config array
     *
     * @return array
    */
    public static function getConfig()
    {
        return static::$config;
    }


    /**
     * Set doctype value
     *
     * @return void
    */
    public static function setDoctype($doctype = '')
    {
        static::$doctype = $doctype;
    }


    /**
     * Get doctype value
     *
     * @return string
    */
    public static function getDoctype()
    {
        return static::$doctype;
    }


    /**
     * Returns tidyfied code
     *
     * @param string $code
     * @param string $doctype
     * @param string $encoding
     * @param array $config
     *
     * @return string
    */
    public static function tidyfy($code = '', $doctype = null, $encoding = null, $config = null)
    {
        if(!extension_loaded('tidy')) return $code;

        if (!$config) $config = static::$config;
        if (!$encoding) $encoding = static::$encoding;
        if ($doctype === null) $doctype = static::$doctype;

        $tidy = new \tidy;
        $tidy->parseString($code, $config, $encoding);
        $tidy->cleanRepair();

        ($doctype == '') ? $output = $tidy->value : $output = $doctype . "\n" . $tidy->value;

        return $output;
    }

}
