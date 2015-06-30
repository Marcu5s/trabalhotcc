<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace app\controllers\painel; 

use app\models\painel\Usuario;
use app\models\painel\Nivel;

use app\help\User;
use core\helps\Session;

class UsuariosController extends \core\app\Controller {

    public function behaviors() {
        return [
        'getClass' => User::rule(),
        ];
    }

    public function actionIndex() {

        return $this->render('index', ['dataProvider' => Usuario::dataProvider()]);
    }

    /**
     * @pulibc
     * 
     * Atualização do usuário
     * 
     * @return string Json
     * 
     */
    public function actionUpdate($id) {

        $model = $this->findModel($id);

        $senha = $model->senha;

        if (\Kanda::$post->post($model)) {

            if ($model->senha <> 123) 
                $model->senha = password_hash($model->senha, PASSWORD_DEFAULT);
            else
                $model->senha = $senha;
            
            if($model->save()){
                Session::setSession([
                    'message' => 'Alterado com sucesso!',
                    'class'   => 'alert-success',
                    ]);
            }else{
                Session::setSession([
                    'message' => 'Erro para alterar',
                    'class'   => 'alert-danger',
                    ]);
            }

            return $this->redirect('update', ['id' => $id]);
        } else {
            return $this->render('form', ['model' => $model]);
        }
    }

    public function actionCreate() {

        $model = new Usuario();

        
        if (\Kanda::$post->post($model)) {


           $model->senha = password_hash($model->senha, PASSWORD_DEFAULT);

           $model->save();

           \Kanda::$app->session->setflash('create', 'Cadastrado com sucesso');

           return $this->redirect();

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
            $model = Usuario::find($id);
            return $model;
        }
    }

}
