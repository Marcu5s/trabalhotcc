<?php 
$this->title = "Zuuf | Perfil";

use core\widgets\FormWidget;
use core\helps\Url;
use core\helps\Session;

?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"></h3>
    <div class="box-tools pull-right">
       <a href="<?php echo Url::home('usuarios') ?>">voltar</a>
    </div>
  </div>
  <div class="box-body">

   <?php if(!empty(Session::getSession()->class)): ?>
    <div class="alert <?php    echo Session::getSession()->class; ?> alert-dismissable">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <h4>  <i class="icon fa fa-check"></i> <?php    echo Session::getSession()->message; ?></h4>
    </div>
  <?php endif ?>
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab_1">Dados</a></li>
        <li><a data-toggle="tab" href="#tab_2">Foto</a></li>

        <li class="pull-right"><a class="text-muted" href="#"><i class="fa fa-gear"></i></a></li>
      </ul>
      <div class="tab-content">
        <div id="tab_1" class="tab-pane active">
         <form id="User" method="POST" action="<?php echo Url::request() ?>">

          <?php
          $form = FormWidget::widget($model, [
            'id' => 'User',
            'style' => 'app\help\Style'
            ]);

          echo $form->textFieldGroup('nome');
          echo $form->textFieldGroup('email');
          echo $form->textFieldGroup('login');
          echo $form->textFieldGroup('senha',['value'=>123],'password'); 

          ?>
          <button type="submit" class="btn btn-success">Enviar</button>
        </form>
      </div><!-- /.tab-pane -->
      <div id="tab_2" class="tab-pane">
      <div>
         
         <img src="<?php echo $this->createUrl().'/app/assets/arquivos/profile/'.Kanda::$app->session->getSession()->photo ?>"  />

       </div>

      </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
  </div><!-- nav-tabs-custom -->
</div><!-- /.box-body -->
<div class="box-footer">              
</div><!-- /.box-footer-->
</div>
<?php
   Session::clear('class');