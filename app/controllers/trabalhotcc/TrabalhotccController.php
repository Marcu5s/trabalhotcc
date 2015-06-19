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
        Session::getSession()->id;
           
            return $this->render('index',['model'=>new Usuario()]);
        
    }
    
    public function actionCadastro(){
        
        $model = new Usuario();
        
        if(\Kanda::$post->post($model)){
            
            
            $file = UploadFile::load($model, 'file');
            
            $widimage = WideImage::load($file->tmpName);
            
           $resize = $widimage->resize(255,255);
                      
           $filename = WWW_ROOT.'/app/assets/arquivos/profile/'.$file->name;
           $resize->saveToFile($filename);
           
           chmod($filename,0777);
           
           $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
           $_POST['file']  =  $file->name; 
           $model = Usuario::create($_POST);
           
           if($model)
              $this->Json([
            'class'=>'sucess',
            'msg'=>'Cadastrado com Sucesso',            
         ]);
           else
              $this->Json([
            'class'=>'warning',
            'msg'=>'Erro para cadastrar',            
         ]);
            
        }else        
            return $this->render('cadastro',['model'=> $model]); 
    }

    public function actionLogaout() {

        session_destroy();
        return header('Location:' . $this->createUrl('painel'));
    }

}
