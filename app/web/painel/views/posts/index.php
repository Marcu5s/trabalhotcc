<?php 
$this->title = "Zuuf | Posts";


use app\models\painel\Post;

$model = Post::all(
        [
          'conditions'=>['usuario_id'=> $usuario_id],
          'group'=>"date_format(criacao,'%d')"
        ]);
 
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
             
             <ul class="timeline">
               <?php
                foreach ($model as $data):
                ?>
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                    <?php echo date('d M. Y',strtotime($data->criacao)) ?>
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <?php
                 $model = Post::all(
                  [ 'conditions'=>
                    [
                      "date_format(criacao,'%d')= '".date('d',strtotime($data->criacao))."' "
                    ]
                  ]);

                 foreach ($model as $data):
                 ?>
                <li>
                  <i class="fa fa-comments bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('H:i',strtotime($data->criacao)) ?></span>
                    <h3 class="timeline-header"><a href="#"><?php echo $data->titulo ?></a></h3>
                    <div class="timeline-body">
                      <?php echo $data->post ?>
                    </div>
                  
                  </div>
                </li>
                <?php endforeach; ?>

              <?php endforeach; ?>
               </ul>


            </div><!-- /.box-body -->
          <div class="box-footer">              
        </div><!-- /.box-footer-->
</div>
        
