<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\controllers\painel;

use app\models\painel\Post;
use core\helps\Session;


class PostsController extends \core\app\Controller {


    public function actionIndex(){

    	return $this->render('index',
    		[
    			'usuario_id'=>Session::getSession()->id
    		]);
 
    }

    public function actionCreate() {
 
        $model = new Post();
        
        if(\Kanda::$post->post($model) && $model->save()){
            
            $this->redirect("post") ;
            
        }else{
            echo 'erro para cadastrar'; 
        }
    }

}