<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 *
 *
 */

namespace app\models\painel;

class Nivel extends \ActiveRecord\Model {

    static $table_name = 'nivel';
    static $primary_key = 'id';
    public $confirm_senha;

    public static function rules() {

        return [
            [['nome','login','senha','confirm_senha','nivel_id'],'required'],
            ['email','email','required','message'=>'Obrigatório','error'=>'Email inválido'],

        ];
    }

    public static function attributeLabels() {

        return [
            'nome' => 'Nome',
         ];
    }

    public static function dataProvider(){

        return array_merge(
            ['data'=>  self::find('all',['select'=>'id'])],
            self::attributeLabels(),['primary_key'=>  self::$primary_key, ]
        );

    }

}