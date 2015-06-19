<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\controllers\painel;

use core\helps\Session;


use app\models\painel\Usuario;
use app\models\painel\Post;

class PainelController extends \core\app\Controller {

    public function actionIndex() {
        
        if (empty(Session::getSession()->nome)) {
            $this->layout= 'login';
            $this->render('login',['model'=>new Usuario()]);
            
        } else {
            
            $post = new Post();
            $post->usuario_id = Session::getSession()->id;
            
            return $this->render('index',
            [
                'usuarios'=>  Usuario::count(),
                'post'=>$post
            ]);
        }
    }

    public function actionLogaout() {

        session_destroy();
        return header('Location:' . $this->createUrl());
    }

}
