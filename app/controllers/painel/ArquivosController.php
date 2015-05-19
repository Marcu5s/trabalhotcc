<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 *
 *
 */

namespace app\controllers\painel;

use app\models\painel\ArquivoCrm;
use core\helps\UploadFile;

class ArquivosController extends  \core\app\Controller {

    public function actionIndex($id){

        $model = new ArquivoCrm();

        $file = UploadFile::load($model,'file');

        if(!empty($file->name)){

            $name = $this->Formart($file->name);

            $model->name = $name;
            $model->name_alias = $file->name;
            $model->size = $file->size;
            $model->type = $file->type;
            $model->cliente_crm_id = $id;

            $file->saveAs($this->dirName().$name);

            $model->save();

            $this->Json([
                'name' =>$file->name,
                'url'=>$this->createUrl('app/assets/arquivos/').$name,
                'delete'=>$this->createUrl('painel/arquivos/delete/'.$model->id.'/'.$id),
            ]);

        }else
            return $this->render('index',['id'=>$id,'model'=>$model,'dataProvider'=>ArquivoCrm::dataProvider($id)]);

    }

    public function actionDelete($id,$cliente_id) {

        if (isset($id) && !empty($id)) {
            $model = $this->findModel($id);

            $filename = $this->dirName().$model->name;
           if(file_exists($filename))
                    unset($filename);

            if ($model->delete()) {
                \Kanda::$app->session->setflash('delete', 'Excluído com sucesso');
                return $this->redirect('index',['id'=>$cliente_id]);
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
            $model = ArquivoCrm::find($id);
            return $model;
        }
    }

    public static function dirName(){

        return WWW_ROOT.'/app/assets/arquivos/';

    }

}