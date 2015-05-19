<?php
/**
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace core\helps;

class Arrays extends \core\app\Controller {
    
    public static function run(){
        return new Arrays();
    }

    public static function map($model=[],$param=[]){
        
      $map = [];
           foreach($model as $res)
             $map[$res->$param[0]] = $res->$param[1];
            
       return $map; 
    }   
    
}


