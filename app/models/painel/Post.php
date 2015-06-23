<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\models\painel;

class Post extends \ActiveRecord\Model {

    static $table_name = 'post';
   
    static $primary_key = 'id';

    public static function rules() {

        return [
            [['usuario_id','post','titulo'],'required'], 
        ];
    }

    public static function attributeLabels() {

        return [
            'usuario_id' => '',
            'post' => 'Descrição',
            'titulo' => 'Titulo'
           
             
        ];
    }
    
     

}