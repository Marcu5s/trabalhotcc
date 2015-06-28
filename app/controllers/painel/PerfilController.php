<?php

/**
* @copyright (c) KandaFramework
* @access public
* 
* 
*/

namespace app\controllers\painel;

use core\helps\Session;
use core\helps\UploadFile;
use core\vendor\wideImage\WideImage;

use app\models\painel\Usuario;
use app\help\User;

class PerfilController extends \core\app\Controller {


public function behaviors() {
    return [
        'getClass' => User::rule(),
    ];
}

public function actionIndex() {
    

    $model = $this->findModel();
        
    $rest_senha = $model->senha;    

     
    if(\Kanda::$post->post($model)){

        if($model->senha <> 123)
            $model->senha = password_hash($model->senha, PASSWORD_DEFAULT);
            else
            $model->senha = $rest_senha;


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
        return $this->redirect();   

    }else
     return $this->render('index',['model'=>$model]);
     
}
public function actionUpload(){

          $model = $this->findModel();  

          $file = UploadFile::load($model, 'file');

          if (empty($file))
                throw new Exception("Error Processing Request", 401);
            
 
          $widimage = WideImage::load($file->tmpName);

          $name = $model->nome.'-'.$model->id.'.'.$file->typeName;
 
          $resize = $widimage->resize(255, 255);

          //verificando se existe foto
          $fileName = static::dir().$model->file;
          if(file_exists($fileName))
               unlink($fileName);
           
          $filename =  static::dir(). $name;
          $resize->saveToFile($filename);

          $model->file = $name;
          $model->save();

          chmod($filename, 0777);
           
            Session::setSession([
                    'photo' => $model->file,
                ]);

          $this->Json(
                [
                    'files'=>
                    [
                        [
                        'url' => $this->createUrl().'/app/assets/arquivos/profile/'.$model->file,                            
                        ],                             
                    ]
                ]
            );


}


static function dir(){

  return WWW_ROOT . '/app/assets/arquivos/profile/';

}

public function findModel(){

    if(empty(Session::getSession()->id))
        throw new Exception("Não pode ser vazio!", 404);
        
    return  Usuario::find(Session::getSession()->id);

}

}
