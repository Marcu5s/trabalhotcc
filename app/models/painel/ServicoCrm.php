<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 12/05/15
 * Time: 14:03
 */

namespace app\models\painel;


class ServicoCrm  extends \ActiveRecord\Model {

    static $table_name = 'servico_crm';
    static $primary_key = 'id';

    public static function rules() {

        return [
            [['name'],'required'],
        ];
    }

    public static function attributeLabels() {

        return [
            'name' => 'Nome',
            'id'  => 'Código'
        ];
    }

    public static function dataProvider(){

        return array_merge(
            ['data'=>self::find('all',['select'=>'id,name'])],
            self::attributeLabels(),['primary_key'=>  self::$primary_key, ]
        );

    }

}