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


class PostController extends \core\app\Controller {

    public function actionCreate() {
 
        $model = new Post();
        
        if(\Kanda::$post->post($model) && $model->save()){
            
            
            
        }else{
            echo 'erro para cadastrar'; 
        }
    }

}