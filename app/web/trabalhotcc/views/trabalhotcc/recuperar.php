<?php

use \core\widgets\FormWidget;

/* $form = FormWidget::widget($model,[
  //'style'=>"\backend\style\Style"
  ]);

 */
?> 
<!--<form method="POST" action="" >
    
<?php
/* echo $form->textFieldGroup('nome');
  echo $form->textFieldGroup('email');
  echo $form->textFieldGroup('cidade');
  echo $form->textFieldGroup('senha',[],'password');



 */
?>
    <input type="submit" value="enviar">
</form>--!>


<!-- Header -->

<!-- Services Section -->
<?php
$this->title = "Daily Virtual || Bem Vindo"
?>

    <!--///////////////////////////////////////////////////////////////////////////////////-->


<section  id="recuperar">
    <link rel="stylesheet" href="estilo.css"/>
    <div class="form-box">

        <form id="form" method="post" action="" enctype="multipart/form-data" >

            <?php

            function Script() {

                return " var Class = data.class; "
                . "setTimeout(function(){ "
                    . "$('.checkbox').html(''); "
                        .  "if(Class == 'success'){ "
                        .   "location.href=data.page;  "
                    . "}; "
                ."},3000); "
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
                <style>
                    html,body{
                        position: relative;
                        height: 100%;
                    }

                    .login-container{
                        position: relative;
                        width: 300px;
                        margin: 80px auto;
                        padding: 20px 40px 40px;
                        text-align: center;
                        background: #fff;
                        border: 1px solid #ccc;
                    }

                    #output{
                        position: absolute;
                        width: 300px;
                        top: -75px;
                        left: 0;
                        color: #fff;
                    }

                    #output.alert-success{
                        background: rgb(25, 204, 25);
                    }

                    #output.alert-danger{
                        background: rgb(228, 105, 105);
                    }


                    .login-container::before,.login-container::after{
                        content: "";
                        position: absolute;
                        width: 100%;height: 100%;
                        top: 3.5px;left: 0;
                        background: #fff;
                        z-index: -1;
                        -webkit-transform: rotateZ(4deg);
                        -moz-transform: rotateZ(4deg);
                        -ms-transform: rotateZ(4deg);
                        border: 1px solid #ccc;

                    }

                    .login-container::after{
                        top: 5px;
                        z-index: -2;
                        -webkit-transform: rotateZ(-2deg);
                        -moz-transform: rotateZ(-2deg);
                        -ms-transform: rotateZ(-2deg);

                    }

                    .avatar{
                        width: 100px;height: 100px;
                        margin: 10px auto 30px;
                        border-radius: 100%;
                        border: 2px solid #aaa;
                        background-size: cover;
                    }

                    .form-box input{
                        width: 100%;
                        padding: 10px;
                        text-align: center;
                        height:40px;
                        border: 1px solid #ccc;;
                        background: #fafafa;
                        transition:0.2s ease-in-out;

                    }

                    .form-box input:focus{
                        outline: 0;
                        background: #eee;
                    }

                    .form-box input[type="text"]{
                        border-radius: 5px 5px 0 0;
                        text-transform: lowercase;
                    }

                    .form-box input[type="password"]{
                        border-radius: 0 0 5px 5px;
                        border-top: 0;
                    }

                    .form-box button.login{
                        margin-top:15px;
                        padding: 10px 20px;
                    }

                    .animated {
                        -webkit-animation-duration: 1s;
                        animation-duration: 1s;
                        -webkit-animation-fill-mode: both;
                        animation-fill-mode: both;
                    }

                    @-webkit-keyframes fadeInUp {
                        0% {
                            opacity: 0;
                            -webkit-transform: translateY(20px);
                            transform: translateY(20px);
                        }

                        100% {
                            opacity: 1;
                            -webkit-transform: translateY(0);
                            transform: translateY(0);
                        }
                    }

                    @keyframes fadeInUp {
                        0% {
                            opacity: 0;
                            -webkit-transform: translateY(20px);
                            -ms-transform: translateY(20px);
                            transform: translateY(20px);
                        }

                        100% {
                            opacity: 1;
                            -webkit-transform: translateY(0);
                            -ms-transform: translateY(0);
                            transform: translateY(0);
                        }
                    }

                    .fadeInUp {
                        -webkit-animation-name: fadeInUp;
                        animation-name: fadeInUp;
                    }
                </style>



                <fieldset>
                    <div class="alert" style="display:none;">
                        <button data-dismiss="alert" class="close" type="button"></button>
                        <strong>

                        </strong>
                    </div>
                    <div class="input-prepend" title="Email">
                        <span class="add-on"><i class="halflings-icon user"></i></span>
                        <input class="input-large span10" name="Usuario[email]" id="username" type="email" placeholder="Informe um email cadastrado">
                    </div>
                    <br/>
                    
                    <button class="btn btn-primary" type="submit">Recuperar</button>
                    <div class="clearfix"></div>

                    <hr>
                    <span class="checkbox"></span>
                </fieldset>

            </div>

        </form>


    </div>

</section>

