<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 12/05/15
 * Time: 16:31
 */

namespace app\models\painel;


class ArquivoCrm extends \ActiveRecord\Model {

    static $table_name = 'arquivo_crm';
    static $primary_key = 'id';
    public $file;

    public static function rules() {

        return [
            [['name'],'required'],
            ['file', 'varchar',],
        ];
    }

    public static function attributeLabels() {

        return [
            'name' => 'Nome',
            'id'  => 'Código',
            'file' =>'Arquivo',
        ];
    }

    public static function dataProvider($id){

        return array_merge(
            ['data'=>self::find('all',['select'=>'id,name,name_alias','conditions'=>["cliente_crm_id=$id"]])],
            self::attributeLabels(),['primary_key'=>  self::$primary_key, ]
        );

    }

}