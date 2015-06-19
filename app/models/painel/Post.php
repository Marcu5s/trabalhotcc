<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\models\painel;

class Usuario extends \ActiveRecord\Model {

    static $table_name = 'post';
   
    public $confirm_senha;

    public static function rules() {

        return [
            [['id_user','post'],'required'],
            #['email','email','required','message'=>'Obrigatório','error'=>'Email inválido'],
             #['id', 'integer', 'required', 'message' => 'Obrigatório', 'error' => 'Somente número inteiros'],
            #['email', 'email', 'required', 'message' => 'Obrigatório', 'error' => 'E-mail inválido'],
            #['file', 'file','extension'=>"png|jpg", 'message' => 'Obrigatório', 'error' => 'Somente pdf, png, jpg'],
        ];
    }

    public static function attributeLabels() {

        return [
            'id_user' => 'Codigo',
            'post' => 'Post',
           
             
        ];
    }
    
     

}