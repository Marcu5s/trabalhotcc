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
<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Daily Virtual</div>
            <div class="intro-heading">Logo</div>
            <a href="/trabalhotcc" class="page-scroll btn btn-xl">Entrar</a>
        </div>
    </div>
</header>

<!-- Services Section -->
<?php
$this->title = "Daily Virtual || Bem Vindo"
?>
<section id="entrar">
    <div class="container">
        <div class="login-container">
            <div id="output"></div>
            <style>
                #body{background: #eee url(http://subtlepatterns.com/patterns/sativa.png);}
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
            <div class="avatar">
                 
            </div>
            <div class="form-box">
                <form id="Validade" class="form-horizontal" action="" method="post">
                    <?php

                    function Script() {

                        return "var Class = data.class; setTimeout(function(){ $('.checkbox').html(''); if(Class == 'success'){  location.href=data.page;  };  },3000); if(Class ==='success'){  $('.avatar').css({'background-image':'url('+data.file+')'});  $('.checkbox').html(data.msg); }; if(Class ==='warning' ){ $('.checkbox').html(data.msg); }  ";
                    }

                    $form = FormWidget::widget($model, [
                                'id' => 'Validade',
                                'ajax' => [
                                    'url' => $this->createUrl('painel/login'),
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
                    <fieldset>
                        <div class="alert" style="display:none;">
                            <button data-dismiss="alert" class="close" type="button"><font><font>×</font></font></button>
                            <strong></strong>
                        </div>
                        <div class="input-prepend" title="Usuário">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="Usuario[login]" id="username" type="text" placeholder="informe seu login">
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Senha">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="Usuario[senha]" id="senha" type="password" placeholder="informe sua senha">
                        </div>
                        <div class="clearfix"></div>

<!--<label class="remember" for="remember"><input type="checkbox" id="remember"><font><font>Lembre de mim</font></font></label>-->
                        </br>
                        <div class="button-login">	
                            <button type="submit" class="btn btn-primary"><font><font>Entrar</font></font></button>
                        </div>
                        </br> <a  href="<?php echo $this->createUrl("cadastro");?>" class="btn btn-primary" ><font><font>Cadastro</font></font></a>
                        <div class="clearfix"></div>

                        <hr>
                        <span class="checkbox"></span>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>

</section>
<section  id="cadastrar">
    <link rel="stylesheet" href="estilo.css"/>
    <div class="furoDaFolha"></div>
    <div class="rasgadoDaFolha"></div>
    <form id="form" method="post" action="<?php echo $this->createUrl('cadastro')?>" enctype="multipart/form-data" >
        
        <?php

                    function Scripts() {

                        return " var Class = data.class; setTimeout(function(){ $('.checkbox').html(''); if(Class == 'success'){ location.href=data.page;  }; },3000); if(Class ==='success'){ $('.checkbox').html(data.msg); }; if(Class ==='warning' ){ $('.checkbox').html(data.msg); }  ";
                    }
/**
 *  'ajax' => [
                                    'url' => $this->createUrl('cadastro'),
                                    'type' => 'POST',
                                    'dataType' => 'json',
                                    'success' => function($data) {
                                        return Script();
                                    },
                                    'error' => function($data) {
                                        
                                    },
                                ],
 */

                    $form = FormWidget::widget($model, [
                                'id' => 'form',
                               
                    ]);
                    ?>
        <fieldset id="fieldset">
            <legend class="boxlegenda">Dados Pessoais:</legend>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="Usuario[nome]" />
            
            <label for="email">Email:</label>
            <input type="text" id="email" name="Usuario[email]" />
            
            <label for="nome">Login:</label>
            <input type="text" id="login" name="Usuario[login]" />
            
            <label for="nome">Senha:</label>
            <input type="password" id="senha" name="Usuario[senha]" />
            
            <label for="nome">Foto:</label>
            <input type="file" id="file" name="Usuario[file]" />
            
            
            <input type="submit" value="Enviar">
            
            
        </fieldset>
        
    </form>
    <style>
        *{	
            margin:0;
            padding:0;

            box-sizing:border-box;
        }


        /** 2- o box maior(filho) */
        #body{
            width:800px;
            padding-left:7%;
            padding-right:5%;
            margin:0 auto;

            background-color:#fcf9ff;
        }

        /**3- Inicio da estrutura do formulario */

        #form{
            width:100%;
            position:relative;
            padding-top:60px;
            padding-bottom:60px;
            margin:-80px -13px;

            border-left:solid 1px red;
            border-right:solid 1px red;
        }

        /**4- contorno do formulario*/
        #fieldset{
            border:none; 
        }

        /**5- legenda do formulario(titulo)*/
        .boxlegenda{
            width:100%;
            height:45px;

            font-size:2.5em;

            border-top:solid 1px lightblue;
            border-bottom:solid 1px lightblue;
        }

        /**6-todas as legendas dos input (titulo de cada item do formulario)*/
        label{
            display:inline-block;
            width:100%;
            margin-top:45px;
            height:45px;

            font-size:2em;

            border-top:solid 1px lightblue;
            border-bottom:solid 1px lightblue;
        }

        /**7-todos os input (todos os espaços para digitar e botao )*/
        input{
            width:100%;
            height:45px;

            font-size:1.5em;

            border-bottom:solid 1px lightblue;	
            outline:none;
            border-top:none;
            border-left:none;
            background-color:#fcf9ff;
        }

        /**8-todos os input obrigatorios*/
        input:required{
            background: url('http://www.avoid.com.br/site/public/images/asterisco.png') no-repeat;
            background-position:right;

        }

        /**9-cursor piscando no input, aparece uma caixa de "dica" */
        input:required:focus + spam {
            display:inline-block
        }

        /**10-caixas de dicas () */
        .aviso{
            width: 350px;
            padding: 15px;
            margin-left:30px;
            margin-top:15px;
            display:none;
            position:absolute;

            font: normal 2.0em/1.0em;
            text-align: center;
            color: black;

            border-radius: 4px 4px 4px 4px;
            border-top:groove 1px #f5c941;

            background:#fec754;

            box-shadow:0 -15px #fec754;
        }

        input[type="submit"]{

        }

        /**- Fim da estrutura do formulario */










        
    </style>

</section>

