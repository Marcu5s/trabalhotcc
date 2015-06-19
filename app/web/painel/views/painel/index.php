<?php

$this->title = "Zuuf | DashBoard";

use core\widgets\FormWidget;
use core\helps\Session;       
use core\helps\Url;       
        
?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
 
        <form method="POST" action="<?php echo Url::home('post/create') ?>">
            <?php
             $form = FormWidget::widget($post);
             
             echo $form->textareaFildGroup('post');
             
             echo $form->textFieldGroup('usuario_id',[''],'hidden');
             
            ?>
            <button class="btn btn-success" type="submit">Enviar</button>
        </form>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript" src="<?php echo $this->createUrl() ?>/app/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
             tinymce.init({
               
        
            selector: 'textarea'
            });
 </script>
