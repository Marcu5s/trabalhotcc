<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 *
 *
 */

namespace app\models\painel;

class ClienteCrm extends \ActiveRecord\Model {

    static $table_name = 'cliente_crm';
    static $primary_key = 'id';


    public static function rules() {

        return [
            [['name','cep','servico_crm_id','status_crm_id'],'required'],
            ['email','email','message'=>'Obrigatório','error'=>'Email inválido'],
            [['number','city','phone_fixed','phone_cellula','address','district','description','state'],'varchar'],

        ];
    }

    public static function attributeLabels() {

        return [
            'cep' => 'Cep',
            'district' => 'Bairro',
            'city' => 'Cidade',
            'address' => 'Endereço',
            'state' => 'UF',
            'name' => 'Nome',
            'id'  => 'Código',
            'email' => 'Email',
            'phone_fixed' => 'Telefone fixo',
            'phone_cellula' => 'Telefone celula',
            'servico_crm_id'=>'Serviços',
            'description'=>'Informações adicionais ',
            'status_crm_id' => 'Status',
            'status'=>'Status', //join
            'servico' => 'Serviço', //join,
            'date'=>'Data criação',
            'phone'=> 'Telefones',
            'number' =>'Nº complemento'
        ];
    }

    public static function dataProvider(){

        $joins  = 'INNER JOIN status_crm as  st ON st.id=cliente_crm.status_crm_id ';
        $joins .= 'INNER JOIN servico_crm as sv ON sv.id=cliente_crm.servico_crm_id';

        $select = "cliente_crm.id,cliente_crm.name,cliente_crm.email,
                   CONCAT('Fixo: ',phone_fixed,' | Celular: ',phone_cellula) as phone,
                   date_format(cliente_crm.creation_date,'%d/%m/%Y as %H:%i ') as date,
                   st.name as status,sv.name as servico";

        return array_merge(
            ['data'=>  self::find('all',['select'=>$select,'joins'=>$joins])],
            self::attributeLabels(),['primary_key'=>  self::$primary_key, ]
        );

    }

}