<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\controllers\trabalhotcc;

use app\models\painel\Recupera_Senha;
use app\models\painel\Usuario;
use core\helps\Session;
use app\vendors\phpMail;

class TrabalhotccController extends \core\app\Controller {

    public function actionIndex() {

        return $this->render('index', ['model' => new Usuario()]);
    }

    public function actionRecuperar() {

        return $this->render('recuperar', ['model' => new Usuario()]);
    }

    public function actionCodigo() {

        $model = new Usuario();
        $rec = new Recupera_Senha();
        if (\Kanda::$post->post($model)) {

            $data = Usuario::find('first', ['email' => $model->email]);

            $rec->key = md5($data->id);

            $rec->usuario_id = $data->id;

            $rec->save();

            TrabalhotccController::sendEmail();


            Session::setSession([
                'key' => $rec->key,
                'id_key' => $data->id,
            ]);
            return $this->render('codigo', ['model' => $model]);

            exit;
        }
    }

    public function actionSenha($key) {
        $model = new Usuario();
        if (\Kanda::$post->post($model)) {

            if ($key == Session::getSession()->key) {
                $user = Usuario::find(Session::getSession()->id_key);
                $user->senha = password_hash($model->senha, PASSWORD_DEFAULT);
                ;

                $user->save();
                Session::clear();

                $this->redirect('index', ['#entrar' => '']);
            }
        } else {
            return $this->render('senha', ['model' => $model]);
        }
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

            if (empty($user)) {
                if ($model->save()) {

                    $name = $model->nome . '-' . $model->id;

                    static::fileUpload($name);

                    Session::setSession([
                        'nome' => $model->nome,
                        'login' => $model->login,
                        'id' => $model->id,
                        'file' => '/painel',
                        'email' => $model->email,
                        'photo' => $name,
                    ]);
                    $this->Json([
                        'class' => 'success',
                        'msg' => 'Cadastrado com Sucesso',
                        'page' => 'painel'
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

    static function fileUpload($name) {
        $file = WWW_ROOT . '/app/assets/defaultuser.jpg';
        $filename = WWW_ROOT . '/app/assets/arquivos/profile/' . $name . '.jpg';

        copy($file, $filename);
    }

    static function sendEmail() {
        if (\Kanda::$post->post($model)) {
            $data = Usuario::find('first', ['email' => $model->email]);

            $nome = $data->nome;
            $email = $data->email;

            $jPa = md5($data->id);


            require 'app\vendors\phpMail';

            $mail = new \PHPMailer();
            $mail->setLanguage('pt');

            $host = 'mail.dailyvirtual.com.br';
            $userName = 'no-reply@virtual.com.br';
            $password = '12345';
            $port = '587';
            $segure = false;

            $from = $userName;
            $fromName = "Daily Virtual";

            $mail->addAddress($email, $nome);

            $mail->isHTML(true);
            $mail->CharSet = 'utf8';
            $mail->WordWrap = 70;

            $mail->Subject = 'Alteração de senha';
            $mail->Body = 'Utilize o codigo abaixo para alterar a senha de acesso <br/>Codigo: ' . $jPa . ' ';

            $send = $mail->send();
            if ($send) {
                echo 'Funcinou';
            } else
                echo 'nao funcionou';
        }
    }

}
