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

    ////////////////////

    public function actionRecuperar() {

        return $this->render('recuperar', ['model' => new Usuario()]);
    }

    ////////////////////

    public function actionRecuperacao() {


        $model = new Usuario();
        $rec = new Recupera_Senha();

        if (\Kanda::$post->post($model)) {

            $key = $rec->key;
            $user = Recupera_Senha::find('first', ['key' => $rec->key]);

            $conf = md5($user->usuario_id);


            if ($key == $conf) {
                return $this->render('senha', ['model' => $model]);
            } else {
                return $this->render('codigo', ['model' => $model]);
            }
        }
    }

    public function actionCodigo() {

        $model = new Usuario();

        if (\Kanda::$post->post($model)) {


            $model = Usuario::first(["email"=>$model->email]);

            if($model == null)
            {
               //colocar uma mensagem informado usuaŕio invalido     
               return $this->render('recuperar',['model'=>$model]);
            }

            Session::setSession([
                'key'=> md5($model->id),
                'user_id' => $model->id,
            ]);

            $rec = new Recupera_Senha();
            $rec->key = md5($model->id);
            $rec->usuario_id = $model->id;
            $rec->save();
            
            static::phpMail($model);
            return $this->render('senha', ['model' => $model]);
        }
    }

    //Tava faltando o key
    public function actionSenha($key) {

        $model = Usuario::find(Session::getSession()->user_id);

        if (\Kanda::$post->post($model)) {

            $model->senha = password_hash($model->senha, PASSWORD_DEFAULT);
            $model->save();

            return $this->redirect();
        }else
            return $this->render('senha', ['model' => $model]);
    }

////////////////////

    public function actionCadastro() {
        $model = new Usuario();
        if (\Kanda::$post->post($model)) {

            $senha = $model->senha;
            $confirme = $_POST['confirme'];
            $login = $model->login;
            $email = $model->email;

            $user = Usuario::find('first', ['login' => $login]);
            $user_email = Usuario::find('first', ['email' => $email]);

            $model->senha = password_hash($model->senha, PASSWORD_DEFAULT);

            if (empty($user_email)) {
                if (empty($user)) {
                    if ($senha == $confirme) {
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
                            'msg' => 'senhas digitadas não coincidem',
                        ]);
                    }
                } else {
                    $this->Json([
                        'class' => 'warning',
                        'msg' => 'Usuario ja cadastrado',
                    ]);
                    $this->Json([
                        'class' => 'warning',
                        'msg' => 'Email ja cadastrado',
                    ]);
                }
            } else {
                $this->Json([
                    'class' => 'warning',
                    'msg' => 'Email ja cadastrado',
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

    public function phpMail($model) {
 
            include WWW_ROOT . "/app/vendors/phpMail/class.phpmailer.php";
            include WWW_ROOT . "/app/vendors/phpMail/PHPMailerAutoload.php";
            
            $nome = $model->nome;
            $email = $model->email;

            $jPa = md5($model->id);



            $mail = new \PHPMailer();
            $mail->setLanguage('pt');

            $mail->isSMTP();
            $mail->Host = 'mail.dailyvirtual.com.br';
            $mail->Username = 'no-reply@dailyvirtual.com.br';
            $mail->Password = '12345';
            $mail->Port = '587';
            $mail->segure = false;
            $mail->SMTPAuth = true;

            $mail->From = $mail->Username;
            $mail->FromName = 'Daily Virtual';

            $mail->addAddress("$email", "$nome");

            $mail->isHTML(true);
            $mail->CharSet = 'utf8';
            $mail->WordWrap = 70;

            $mail->Subject = 'Alteração de senha';
            $mail->Body = 'Essa e a sua nova senha.<br/><br/>Senha: ' . $jPa . ''
                    . '<br/><br/>utilize nosso painel para altera-la ';
            $mail->send();
         
    }

}
