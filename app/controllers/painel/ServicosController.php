<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 *
 *
 */

namespace app\controllers\painel;

use app\models\painel\ServicoCrm;

class ServicosController extends  \core\app\Controller {

    public function actionIndex(){
        return $this->render('index',['dataProvider'=>ServicoCrm::dataProvider()]);

    }

    public function actionCreate(){

        $model = new ServicoCrm();

        if(\Kanda::$post->post($model)){


            $model->create($_POST);

            \Kanda::$app->session->setflash('create', 'Cadastrado com sucesso');

            return $this->redirect();


        }else{

            return $this->render('form',['model'=>$model]);
        }

    }

    public function actionUpdate($id) {

        $model = $this->findModel($id);

        if (\Kanda::$post->post($model)) {

            $model->update_attributes($_POST);

            \Kanda::$app->session->setflash('update', 'Alterado com sucesso');

            return $this->redirect('update', ['id' => $id]);
        } else {
            return $this->render('form', ['model' => $model]);
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

    /**
     *
     * @param int $id
     * @return object
     */
    public function findModel($id) {

        if (!empty($id)) {
            $model = ServicoCrm::find($id);
            return $model;
        }
    }

}