<?php

$this->title = "Zuuf | DashBoard";

use core\widgets\FormWidget;
use core\helps\Session;       
use core\helps\Url;       
        
?> 


<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $this->title ?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <form method="POST"  id="Validate" action="<?php echo Url::home('posts/create') ?>">
            <?php
             $form = FormWidget::widget($post,[
                'id'=>'Validate',
                ]);
             
             echo $form->textFieldGroup('titulo',['class'=>'form-control']); 

             echo $form->textareaFildGroup('post');
             
             
             echo $form->textFieldGroup('usuario_id',[''],'hidden');
             
            ?>
            <br/>
            <button class="btn btn-success" type="submit">Enviar</button>
        </form>
            </div><!-- /.box-body -->
            <div class="box-footer">              
            </div><!-- /.box-footer-->
          </div>
        

<script type="text/javascript" src="<?php echo $this->createUrl() ?>/app/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
             tinymce.init({
                  selector: 'textarea'
            });
 </script>
