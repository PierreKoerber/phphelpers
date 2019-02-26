<?php
namespace AppBundle\foundation\tests;


require("../src/myString.php") ;

use AppBundle\foundation\myString;

use PHPUnit\Framework\TestCase;

class myStringTest extends TestCase
{
    public function testMisc()
    {
        
        $test = "hello, world, from, world, world, world" ;
        $s = new myString($test) ;


        // *** to string
        $this->assertEquals( $test, $s->toString()) ;

        // *** count
        $this->assertEquals( 5, $s->getStringCount(",") ) ;
        $this->assertEquals( 4, $s->getStringCount("world") ) ;

        // *** replace
        $s = new myString("pierre paul") ;
        $this->assertEquals("ierre aul", $s->replace("p","") ) ;

        // *** strleftback
        $s = new myString("12:23:44") ;
        $res = $s->strleftback(":") ;
        $this->log($s->toString() . "==>" . $res) ;
        $this->assertEquals("12:23", $s->strleftback(":") ) ;
        
        // *** strleft
        $s = new myString("12:23:44") ;
        $res = $s->strleft(":") ;
        $this->log($s->toString() . "==>" . $res) ;
        $this->assertEquals("12", $s->strleft(":") ) ;

         // *** strright
        $s = new myString("12:23:44") ;
        $res = $s->strright(":") ;
        $this->log($s->toString() . "==>" . $res) ;
        $this->assertEquals("23:44", $s->strright(":") ) ;


         // *** strrightback
        $s = new myString("12:23:44") ;
        $res = $s->strrightback(":") ;
        $this->log($s->toString() . "==>" . $res) ;
        $this->assertEquals("44", $s->strrightback(":") ) ;
    }


    public function logSpacer(){
        $this->log("-------------------------------------------------------") ;
    }
    public function log($msg){
         print "\n" . $msg ;
    }
}
