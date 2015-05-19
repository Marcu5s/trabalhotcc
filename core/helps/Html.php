<?php
/**
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace core\helps;

class Html extends \core\app\Controller {

    public static function run() {
        return new Html();
    }

    /**
     * 
     * @param type $text
     * @param type $url
     * @param type $param
     * @return string
     */
    public static function a($text='',$url='',$param=[]) {
        
      $tag = "<a href='{$url}' ".parent::htmlOptions($param)."  >{$text}</a>";
      
      return $tag;        
    }
    /**
     * 
     * @param type $text
     * @param type $url
     * @param type $param
     * @return string
     */
    public static function span($text,$param=[]) {
        
      $tag = "<span ".parent::htmlOptions($param)."  >{$text}</span>";
      
      return $tag;        
    }
    /**
     * 
     * @param type $text
     * @param type $url
     * @param type $param
     * @return string
     */
    public static function button($text,$type='button',$param=[]) {
        
      $tag = "<button type='$type' ".parent::htmlOptions($param)."  >{$text}</button>";
      
      return $tag;        
    }
    /**
     * 
     * @param type $file
     * @return string
     */
    public static function cssFile($file = '') {

        $tag = "<link rel='stylesheet' href='" . parent::$assets . "css/{$file}' />";

        return $tag;
    }
    /**
     * 
     * @param type $file
     * @return string
     */
    public static function jsFile($file='') {

        $tag = "<script src='" . parent::$assets . "js/{$file}'></script>";

        return $tag;
    }
    /**
     * 
     * @param type $type
     * @param type $param
     * @return string
     */
    public static function input($type = 'text',$name='',$value='',$param = []) {

        $tag = "<input type='{$type}' value='$value' name='$name' ".parent::htmlOptions($param)." />";

        return $tag;
    }
    
    public static function textarea($name,$value='',$param=[]){
        
        $tag = "<textarea name='$name' ".parent::htmlOptions($param)." >$value</textarea>";
        
        return $tag;
        
    }
    
     /**
      * 
      * @param string $name
      * @param string|int $selected
      * @param array() $options
      * @param array() $param
      * @return string
      */
    public static function dropdowlist($name,$selected,$options=[],$param=[]){
        
        $tag = "<select id='$name' ".parent::htmlOptions($param)." name='$name'>
                                    ".self::createOptions($options,$selected)."
        </select>";
       
        return $tag;
        
    }
    
    /**
     * 
     * @param array $options
     * @return string
     */
    public static function createOptions($options=[],$selected){
        
      $op = '<option   value="">Selecione</option>';  
      foreach($options as $value => $title){
              $sel = '';
              if($selected==$value)
                  $sel = 'selected';
          
          $op .= "<option {$sel} value='$value'>".$title."</option>";
          
      }
      return $op;
    }
 
    public function teste(){
        echo 'hheheh';
    }

}
