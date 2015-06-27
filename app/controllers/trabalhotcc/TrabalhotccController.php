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
use core\helps\UploadFile;
use core\vendor\wideImage\WideImage;

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

        $login = $model->login;

        $user = Usuario::find('first', ['login' => $login]);


        if (\Kanda::$post->post($model)) {


            $file = UploadFile::load($model, 'file');

            if (!empty($file)) {

                $widimage = WideImage::load($file->tmpName);

                $model->file = $file->name;

                $resize = $widimage->resize(255, 255);

                $filename = WWW_ROOT . '/app/assets/arquivos/profile/' . $file->name;
                $resize->saveToFile($filename);

                chmod($filename, 0777);
            }

            $model->senha = password_hash($model->senha, PASSWORD_DEFAULT);
            if ($user) {
                $this->Json([
                    'class' => 'warning',
                    'msg' => 'Usuario ja cadastrado',
                ]);
            } else {

                if ($model->save()) {
                    $this->Json([
                        'class' => 'sucess',
                        'msg' => 'Cadastrado com Sucesso',
                    ]);
                } else{
                    $this->Json([
                        'class' => 'warning',
                        'msg' => 'Erro para cadastrar',
                    ]);
                }
            }
        } else
            return $this->render('cadastro', ['model' => $model]);
    }

    public function actionLogaout() {

        session_destroy();
        return header('Location:' . $this->createUrl('painel'));
    }

}
