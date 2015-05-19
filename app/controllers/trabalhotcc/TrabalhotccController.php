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

class TrabalhotccController extends \core\app\Controller {

    public function actionIndex() {
           
            return $this->render('index',['model'=>new Usuario()]);
        
    }

    public function actionLogaout() {

        session_destroy();
        return header('Location:' . $this->createUrl('painel'));
    }

}
