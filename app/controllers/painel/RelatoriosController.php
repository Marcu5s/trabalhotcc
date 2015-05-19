<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 *
 *
 */

namespace app\controllers\painel;

use app\models\painel\RelatorioCrm;
use app\models\painel\ClienteCrm;
use app\models\painel\StatusCrm;
use app\models\painel\ServicoCrm;




class RelatoriosController extends  \core\app\Controller {

    public function actionIndex(){


        return $this->render('index',
            [
            'model'=>new RelatorioCrm(),
            'status'=>StatusCrm::all(),
            'servicos'=>ServicoCrm::all()
            ]);

    }

    public function actionCreate(){

        $model = new RelatorioCrm();


        if(\Kanda::$post->post($model)){

         $conditions  = "date_format(cliente_crm.creation_date,'%d/%m/%Y') BETWEEN '{$_POST['start']}' AND '{$_POST['end']}'";

         if(!empty($_POST['servicos']))
            $conditions .= " AND servico_crm_id={$_POST['servicos']}";
         if(!empty($_POST['status']))
            $conditions .= " AND status_crm_id={$_POST['status']}";


         $joins  = 'INNER JOIN status_crm as  st ON st.id=cliente_crm.status_crm_id ';
         $joins .= 'INNER JOIN servico_crm as sv ON sv.id=cliente_crm.servico_crm_id';

         $select = 'cliente_crm.*,st.name as status,sv.name as servico';

         $data = ClienteCrm::all(['select'=>$select,'conditions'=>[$conditions],'order'=>'creation_date','joins'=>$joins]);

         $tr = '';

             foreach ($data as $res):

                 $tr .= "<tr>
                     <td>$res->name</td>
                     <td>$res->email</td>
                     <td>Fixo: $res->phone_fixed | Celular: $res->phone_cellula</td>
                     <td>" . date('d/m/Y -   H:i', strtotime($res->creation_date)) . "</td>
                     <td>$res->status</td>
                     <td>$res->servico</td>
                     </tr>";

             endforeach;

            echo $tr;

        }

    }

    /**
     *
     * @param int $id
     * @return object
     */
    public function findModel($id) {

        if (!empty($id)) {
            $model = RelatorioCrm::find($id);
            return $model;
        }
    }

}