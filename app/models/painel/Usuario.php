<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\models\painel;

class Usuario extends \ActiveRecord\Model {

    static $table_name = 'usuario';
    static $primary_key = 'id';
    public $confirm_senha;

    public static function rules() {

        return [
            [['nome','login','senha','confirm_senha','nivel_id'],'required'],
            ['email','email','required','message'=>'Obrigatório','error'=>'Email inválido'],
             #['id', 'integer', 'required', 'message' => 'Obrigatório', 'error' => 'Somente número inteiros'],
            #['email', 'email', 'required', 'message' => 'Obrigatório', 'error' => 'E-mail inválido'],
            #['foto', 'file', 'required','extension'=>"pdf|png|jpg", 'message' => 'Obrigatório', 'error' => 'Somente pdf, png, jpg'],
        ];
    }

    public static function attributeLabels() {

        return [
            'nome' => 'Nome',
            'login' => 'Login',
            'user_id' => 'Código',
            'senha' => 'Senha',
            'nivel_id' => 'Nível',
            'confirm_senha' => 'Confirmar senha',
            'email'=>'Email',
             
        ];
    }
    
    public static function dataProvider(){
     
    return array_merge(
                       ['data'=>  self::find('all',['select'=>'login,nome,user_id,email'])],
                       self::attributeLabels(),['primary_key'=>  self::$primary_key, ]
            );
             
    }    

}