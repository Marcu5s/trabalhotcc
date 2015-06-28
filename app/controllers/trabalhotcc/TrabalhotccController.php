<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\controllers\trabalhotcc;

use app\models\painel\Usuario;
use core\helps\Session;

class TrabalhotccController extends \core\app\Controller {

    public function actionIndex() {

        return $this->render('index', ['model' => new Usuario()]);
    }

    public function actionRecuperar() {

        return $this->render('recuperar', ['model' => new Usuario()]);
    }

    public function actionCodigo() {

        return $this->render('codigo', ['model' => new Usuario()]);
    }

    public function actionSenha() {

        return $this->render('senha', ['model' => new Usuario()]);
    }

    public function actionCadastro() {
        $model = new Usuario();
        ///Aqui não tem como pegar o valor do $model->login
        $login = $model->login;
        $user = Usuario::find('first', ['login' => $login]);

        if (\Kanda::$post->post($model)) {

            //Manter essa daqui! Está criando o mesmo encima
            //Nesse caso está substituindo as variaveis $login,$user

            $login = $model->login;
            $user = Usuario::find('first', ['login' => $login]);
             
            $model->senha = password_hash($model->senha, PASSWORD_DEFAULT);

            if (!$user) {
                if ($model->save()) {
                    $this->Json([
                        'class' => 'sucess',
                        'msg' => 'Cadastrado com Sucesso',
                    ]);
                } else {
                    $this->Json([
                        'class' => 'warning',
                        'msg' => 'Erro para cadastrar',
                    ]);
                }
            } else {
                $this->Json([
                    'class' => 'warning',
                    'msg' => 'Usuario ja cadastrado',
                ]);
            }
        } else
            return $this->render('cadastro', ['model' => $model]);
    }

    public function actionLogaout() {

        session_destroy();
        return header('Location:' . $this->createUrl('painel'));
    }

}
