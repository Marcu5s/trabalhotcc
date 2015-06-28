<?php

use \core\widgets\FormWidget;
  
?>
</section>
<section  id="cadastrar">
    <link rel="stylesheet" href="estilo.css"/>
    <div class="form-box">

        <form id="form" method="post" action="" enctype="multipart/form-data" >

            <?php
             
            function Script() {

                return " var Class = data.class; "
                
                . "if(Class ==='success'){ "
                . "$('.checkbox').html(data.msg);"
                . "}; "
                . "if(Class ==='warning' ){ "
                . "$('.checkbox').html(data.msg); "
                . "}  ";
            }

            $form = FormWidget::widget($model, [
                'id' => 'form',
                'ajax' => [
                'url' => $this->createUrl('cadastro'),
                'type' => 'POST',
                'dataType' => 'json',
                'success' => function($data) {
                    return Script();
                },
                'error' => function($data) {

                },
                ],
                ]);
                ?>

                <div class="login-container">
                    <div id="output"></div>

                </style>



                <fieldset>
                    <div class="alert" style="display:none;">
                        <button data-dismiss="alert" class="close" type="button">

                        </button>
                        <strong>

                        </strong>
                    </div>
                    <div class="input-prepend" title="Nome">
                        <span class="add-on"><i class="halflings-icon user"></i></span>
                        <input class="input-large span10" name="Usuario[nome]" id="name" type="name" placeholder="informe seu Nome">
                    </div>
                    <div class="input-prepend" title="Email">
                        <span class="add-on"><i class="halflings-icon user"></i></span>
                        <input class="input-large span10" name="Usuario[email]" id="username" type="email" placeholder="Informe seu email">
                    </div>

                    <div class="input-prepend" title="Login">
                        <span class="add-on"><i class="halflings-icon user"></i></span>
                        <input class="input-large span10" name="Usuario[login]" id="username" type="text" placeholder="informe seu login">
                    </div>


                    <div class="input-prepend" title="Senha">
                        <span class="add-on"><i class="halflings-icon lock"></i></span>
                        <input class="input-large span10" name="Usuario[senha]" id="senha" type="password" placeholder="informe sua senha">
                    </div>
                    <div class="input-prepend" title="File">
                        <span class="add-on"><i class="halflings-icon user"></i></span>
                        <input class="input-large span10" name="Usuario[file]" id="username" type="file" placeholder="informe seu login">
                    </div>
                    <div class="clearfix"></div>
                </br> 
                <button class="btn btn-primary" type="submit">Cadastro</button>
                <div class="clearfix"></div>

                <hr>
                <span class="checkbox"></span>
            </fieldset>

        </div>

    </form>
</div>
 