<?php 
$this->title = "Zuuf | Usuários";

use core\widgets\GridView;
use core\helps\Url;
use core\helps\Session;

?>
 
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"></h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
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
      <?php
                            echo GridView::widget([
                                'dataProvider' => $dataProvider,
                                'classTable'=>'table datatable',
                                'columns' => [
                                            'id',
                                            'nome',
                                            ],
                                        'actionColumns' => ['update'],
                                    ]);
                                    ?>
</div><!-- /.box-body -->
<div class="box-footer">              
</div><!-- /.box-footer-->
</div>
<?php
   Session::clear('class');