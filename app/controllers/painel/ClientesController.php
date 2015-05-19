<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 *
 *
 */

namespace app\controllers\painel;

use app\models\painel\ClienteCrm;
use app\models\painel\ServicoCrm;
use app\models\painel\StatusCrm;


class ClientesController extends  \core\app\Controller {

    public function actionIndex(){

        return $this->render('index',['dataProvider'=>ClienteCrm::dataProvider()]);

    }

    public function actionCreate(){

        $model = new ClienteCrm();

        if(\Kanda::$post->post($model)){

            $model->create($_POST);

            \Kanda::$app->session->setflash('create', 'Cadastrado com sucesso');

            return $this->redirect();

        }else{

            return $this->render('form',['model'=>$model,'servicos'=>ServicoCrm::all(),'status'=>StatusCrm::all()]);
        }

    }


    public function actionUpdate($id) {

        $model = $this->findModel($id);

        if (\Kanda::$post->post($model)) {

            $model->update_attributes($_POST);

            \Kanda::$app->session->setflash('update', 'Alterado com sucesso');

            return $this->redirect('update', ['id' => $id]);
        } else {
            return $this->render('form', ['model' => $model,'servicos'=>ServicoCrm::all(),'status'=>StatusCrm::all()]);
        }
    }

    public function actionDelete($id) {

        if (isset($id) && !empty($id)) {
            $model = $this->findModel($id);
            if ($model->delete()) {
                \Kanda::$app->session->setflash('delete', 'Excluído com sucesso');
                return $this->redirect();
            }
        }
    }

    public function actionGerarcsv(){


        $joins  = 'INNER JOIN status_crm as  st ON st.id=cliente_crm.status_crm_id ';
        $joins .= 'INNER JOIN servico_crm as sv ON sv.id=cliente_crm.servico_crm_id';

        $select = "cliente_crm.*,
                   date_format(cliente_crm.creation_date,'%d/%m/%Y as %H:%i') as date,
                   st.name as status,sv.name as servico";

        $model = ClienteCrm::all(['select'=>$select,'joins'=>$joins]);

        $csv = "Nome;E-mail;Telefone-fixo; Telefone-celular;Cep;Bairro;Cidade;Endereço;UF;Nº complemento;Serviço;Status;Data criaçao; \n";

        foreach($model as $res)
                 $csv .= "$res->name;$res->email;$res->phone_fixed;$res->phone_cellula;$res->cep;$res->district;$res->city;$res->address;$res->state;$res->number;$res->servico;$res->status;$res->date \n";

        echo utf8_encode($csv);


    }

    /**
     *
     * @param int $id
     * @return object
     */
    public function findModel($id) {

        if (!empty($id)) {
            $model = ClienteCrm::find($id);
            return $model;
        }
    }

}