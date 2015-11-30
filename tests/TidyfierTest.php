<?php

use Roumen\Tidyfier\Tidyfier as Tidyfier;

class TidyfierTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testTidyfy()
    {
       $code = '<html>  <head>  <title> 123 abc     </title>  </head>                       <body>   <p> Bla Bla Bla </p>     </body>                </html>';

       $tidyCode  = '<html>'."\r\n";
       $tidyCode .= '<head>'."\r\n";
       $tidyCode .= '    <title>123 abc</title>'."\r\n";
       $tidyCode .= '</head>'."\r\n"."\r\n";
       $tidyCode .= '<body>'."\r\n";
       $tidyCode .= '    <p>Bla Bla Bla</p>'."\r\n";
       $tidyCode .= '</body>'."\r\n";
       $tidyCode .= '</html>'."\r";

       $this->assertEquals($tidyCode, Tidyfier::tidyfy($code,''));
       $this->assertEquals('<!DOCTYPE html>'."\r\n".$tidyCode, Tidyfier::tidyfy($code));
    }

}
