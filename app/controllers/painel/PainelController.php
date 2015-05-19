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

class PainelController extends \core\app\Controller {

    public function actionIndex() {
        
        if (empty(Session::getSession()->nome)) {
            $this->layout= 'login';
            $this->render('login',['model'=>new Usuario()]);
            
        } else {
            return $this->render('index',['usuarios'=>  Usuario::count()]);
        }
    }

    public function actionLogaout() {

        session_destroy();
        return header('Location:' . $this->createUrl());
    }

}
