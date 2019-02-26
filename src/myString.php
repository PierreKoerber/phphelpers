<?php
namespace AppBundle\foundation ;


/**
* @package myString
* @version 1.0
* @author pierre koerber - www.pierre-koerber.ch
* @license This software is licensed under the MIT license: http://opensource.org/licenses/MIT
* @copyright pierre koerber
*
*/

class myString
{
        private $s ;

        function __construct($s) {
            $this->s = $s ;
        }
        
        public function hasSubstring($x){
            if ( strpos( $this->s, $x) == false)
                return false ;
            return true ;
        }

        public function replace($pattern, $newValue){
            $this->s = str_replace ($pattern, $newValue, $this->s) ;
            return $this->s ;
        }

        public function toString() {
            return $this->s ;
        }

        public function getStringCount($needle){
            return substr_count($this->s, $needle) ;
        }

        public function strleftback($string){
            $p = strrpos($this->s, $string) ;
            if ($p>0)
                return substr($this->s, 0, $p) ;
            return "" ;
        }
        public function strleft($string){
            $p = strpos($this->s, $string) ;
            if ($p>0)
                return substr($this->s, 0, $p) ;
            return "" ;
        }

        public function strrightback($string){
            $p = strrpos($this->s, $string) ;
            if ($p>0)
                 return substr($this->s, $p+1, strlen($this->s) ) ;
            return "" ;
        }

        public function strright($string){
            $p = strpos($this->s, $string) ;
            if ($p>0)
                return substr($this->s, $p+1, strlen($this->s) ) ;
            return "" ;
        }

        public function slugify($delimiter = '_') {

            $string = $this->s ;
            $replace = array() ;

            // https://github.com/phalcon/incubator/blob/master/Library/Phalcon/Utils/Slug.php
            if (!extension_loaded('iconv')) {
              throw new Exception('iconv module not loaded');
            }
            // Save the old locale and set the new locale to UTF-8
            $oldLocale = setlocale(LC_ALL, '0');
            setlocale(LC_ALL, 'en_US.UTF-8');
            $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
            if (!empty($replace)) {
              $clean = str_replace((array) $replace, ' ', $clean);
            }
            $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
            $clean = strtolower($clean);
            $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
            $clean = trim($clean, $delimiter);
            // Revert back to the old locale
            setlocale(LC_ALL, $oldLocale);

            $this->s = $clean ;
            return $clean;
        }




}