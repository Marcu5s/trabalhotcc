<?php
/**
 * Created by PhpStorm.
 * User: thiago
 * Date: 13/05/15
 * Time: 13:15
 */

namespace app\models\painel;


class RelatorioCrm{


    public static function rules(){

        return [
               [['start','end','status','servicos'],'varchar'],
        ];

    }

    public static function attributeLabels() {

        return [
            'status' => 'Status',
            'servicos'  => 'Serviços'
        ];
    }


}