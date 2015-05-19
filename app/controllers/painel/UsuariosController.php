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

        if (\Kanda::$post->post($model)) {
            $_POST['id'] = $id;
            if ($_POST['senha'] <> 123 && $_POST['senha'] == $_POST['confirm_senha']) {

                $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);

                unset($_POST['confirm_senha']);
            } else
                unset($_POST['senha']);

            $model->update_attributes($_POST);

            \Kanda::$app->session->setflash('update', 'Alterado com sucesso');

            return $this->redirect('update', ['id' => $id]);
        } else {
            return $this->render('form', ['model' => $model,'nivel'=>new Nivel()]);
        }
    }

    public function actionCreate() {

        $model = new Usuario();
 
        
        if (\Kanda::$post->post($model)) {
            
            if ($_POST['senha'] <> 123 && $_POST['senha'] == $_POST['confirm_senha']) {
                             
                
                $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);

                unset($_POST['confirm_senha']);
            } else {
                \Kanda::$app->session->setflash('update', 'Senha inválida', 'warning');

                return $this->redirect('create');
            }

            $model = new Usuario($_POST);

            $model->save(false);
            
            \Kanda::$app->session->setflash('create', 'Cadastrado com sucesso');
             
            return $this->redirect();
            
        } else {
             
            return $this->render('form', ['model' => $model,'nivel'=>new Nivel()]);
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
