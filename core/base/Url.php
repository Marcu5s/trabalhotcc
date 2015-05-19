<?php
/**
 * 
 * 
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
namespace core\base;

class Url{
    
    public static  $server_name = '';
    
    public static function segment($arg=null)
    {
        $url = $_SERVER['REQUEST_URI'];
        if($_SERVER['SERVER_NAME'] == 'localhost'){
            self::$server_name =   basename(getcwd()).'/';
          $url = substr($_SERVER['REQUEST_URI'],strlen(self::$server_name));
        }      
        if(isset($_GET))
        {
            $url = explode('?',$url);
            $url = $url[0];
        }

        $url = explode('/', trim($url, '/'));


        if($arg==null)
        {
            return end($url);
        }
        else
        {
            array_unshift($url, null);
            unset($url[0]);
            if(isset($url[$arg]))
            {
                return $url[$arg];
            }
            else
            {
                return null;
            }
        }
    }
    public function Formart($string) {


        $map = array(
            'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a',
            'é' => 'e', 'ê' => 'e', 'í' => 'i', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ú' => 'u', 'ü' => 'u',
            'ç' => 'c', 'Á' => 'a', 'À' => 'a', 'Ã' => 'a',
            'Â' => 'a', 'É' => 'e', 'Ê' => 'e', 'Í' => 'i',
            'Ó' => 'o', 'Ô' => 'o', 'Õ' => 'o',
            'Ú' => 'u', 'Ü' => 'u', 'Ç' => 'c', '?' => '()');
        $str = str_replace(' ', '-', strtolower($string));
        return strtr($str, $map);
    }
 }