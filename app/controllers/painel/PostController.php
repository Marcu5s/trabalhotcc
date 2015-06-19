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
use app\help\User;

class PostController extends \core\app\Controller {

    public function actionCreate() {

        $model = new Post();

        return $this->render('painel', ['model' => $model]);
    }

}
