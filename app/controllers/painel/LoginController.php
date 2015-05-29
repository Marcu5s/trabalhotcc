<?php 
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace app\controllers\painel;
use app\models\painel\Usuario;
use core\helps\Session;


class LoginController extends \core\app\Controller{
    
    public function actionIndex(){
         
        $model = new Usuario();
              
        if(\Kanda::$post->post($model)){
                      
                       
        $login    = $_POST['login'];
        $password = $_POST['senha'];
        
        
        $user = Usuario::find('first',['login'=>$login]);
         
        if($user){
            
        if(password_verify($password,$user->senha)){
                $this->setSession($user);     
        }else{
          
            $this->Json([
                'msg'=>'login ou senha inválida','class'=>'warning'
            ]);
            
          } 
            
        }else{
            
        $this->Json([
            'class'=>'warning',
            'msg'=>'Usuário não encontrado!',            
         ]);
        }
        
       }
    }
    /**
     * 
     * @param type $objct
     * 
     */
    public function setSession($objct){
     
     
      
   Session::setSession([
     'nome'      =>  $objct->nome,
     'login'     =>  $objct->login,
     'id'        =>  $objct->id,
     'file'      =>  '/',
     'email'     =>  $objct->email,
     'photo'     => $objct->file,
    ]);
 
        
    //$_SESSION['idLog']     =  $idLog;
          
    parent::Json([
        'msg'=>'Aguarde...',
        'success'=>1,
        'class'=>'success',
        'page'=>$this->createUrl('painel'),
        'file'=> $this->createUrl().'/app/assets/arquivos/profile/'.$objct->file,
    ]);
     
 }
    
    

    
   
    
}