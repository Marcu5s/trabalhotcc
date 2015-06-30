<?php
$this->title = "Zuuf | DashBoard";

use core\widgets\FormWidget;
use core\helps\Session;
use core\helps\Url;
?> 


<div class="box">
    <div class="box-header with-border">
         <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form method="POST"  id="Validate" action="<?php echo Url::home('posts/create') ?>">
            <?php
            $form = FormWidget::widget($post, [
                        'id' => 'Validate',
            ]);

            echo $form->textFieldGroup('titulo', ['class' => 'form-control']);

            echo $form->textareaFieldGroup('post');


            echo $form->textFieldGroup('usuario_id', [''], 'hidden');
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
    selector: "textarea",
   
    plugins: [
         "advlist image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>
