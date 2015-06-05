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
            <div class="intro-lead-in">Slogan</div>
            <div class="intro-heading">LOGO</div>
            <a href="/trabalhotcc" class="page-scroll btn btn-xl">Entrar</a>
        </div>
    </div>
</header>

<!-- Services Section -->
<?php
$this->title = "ZuuF || Bem Vindo"
?>
<section id="body" id="services">
    <link rel="stylesheet" href="estilo.css"/>
    <div class="furoDaFolha"></div>
    <div class="rasgadoDaFolha"></div>
    <form id="form" method="post" action="<?php echo $this->createUrl('cadastro')?>" enctype="multipart/form-data" >
        
        <?php

                    function Script() {

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

l