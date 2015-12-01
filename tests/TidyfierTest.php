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

       $tidyCode  = '<html>'."\n";
       $tidyCode .= '<head>'."\n";
       $tidyCode .= '    <title>123 abc</title>'."\n";
       $tidyCode .= '</head>'."\n"."\n";
       $tidyCode .= '<body>'."\n";
       $tidyCode .= '    <p>Bla Bla Bla</p>'."\n";
       $tidyCode .= '</body>'."\n";
       $tidyCode .= '</html>';

       //$this->assertEquals($tidyCode, Tidyfier::tidyfy($code,''));
       $this->assertEquals('<!DOCTYPE html>'."\n".$tidyCode, Tidyfier::tidyfy($code));
    }

}
