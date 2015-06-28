<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\models\painel;

class Recupera_Senha extends \ActiveRecord\Model {

    static $table_name = 'recupera_senha';
   
    static $primary_key = 'id';

    public static function rules() {

        return [
            [['key','usuario_id'],''], 
        ];
    }

    public static function attributeLabels() {

        return [
            'usuario_id' => '',
            'key' => 'Codigo',
           
             
        ];
    }
    
     

}