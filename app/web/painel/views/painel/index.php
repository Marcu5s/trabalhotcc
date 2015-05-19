<?php $this->title = "Zuuf | DashBoard" ?>

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
        <div class='box-body pad'>
            <!--<script src="/vendor/tinymce/tinymce.min.js"></script>

            <textarea>
                <hr width="60%" />
                <script language="javascript">

                    function OnEnter(evt)
                    {
                        var key_code = evt.keyCode ? evt.keyCode :
                                evt.charCode ? evt.charCode :
                                evt.which ? evt.which : void 0;


                        if (key_code == 13)
                        {
                            var input = "<hr width="60 %" />";
                            $.append(input);
                        }
                    }
                </script>     

            </textarea>
            <script type="text/javascript">
                $(function () {
                    tinymce.init({selector: 'textarea', plugins: "code"});
                });
            </script> -->

            <div id="folha">
                <script src='http://code.jquery.com/jquery-1.11.2.min.js'></script>

                <style>
                    *{	
                        margin:0;
                        padding:0;

                        box-sizing:border-box;
                    }

                    /** 1- o box maior(pai) */
                    #folha{	
                        background:#130d06;
                    }

                    /** 2- o box maior(filho) */
                    #corpo{
                        width:960px;
                        padding-left:7%;
                        padding-right:5%;
                        margin:0 auto;

                        background-color:#fcf9ff;
                    }

                    /**3- Inicio da estrutura do formulario */

                    #forms{
                        width:100%;
                        position:relative;
                        padding-top:60px;
                        padding-bottom:60px;
                        margin:20px;

                        border-left:solid 1px red;
                        border-right:solid 1px red;
                    }

                    /**4- contorno do formulario*/
                    fieldset{
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

                        font-size:2.5em;

                        border-top:solid 1px lightblue;
                        border-bottom:solid 1px lightblue;
                    }

                    /**7-todos os input (todos os espaços para digitar e botao )*/
                    #inputm{
                        width:100%;
                        height:45px;

                        font-size:2.5em;

                        border-bottom:solid 1px lightblue;	
                        outline:none;
                        border-top:none;
                        border-left:none;
                        background-color:#fcf9ff;
                    }

                    /**8-todos os input obrigatorios*/
                    #inputm:required{
                        background: url('http://www.avoid.com.br/site/public/images/asterisco.png') no-repeat;
                        background-position:right;

                    }

                    /**9-cursor piscando no input, aparece uma caixa de "dica" */
                    #inputm:required:focus + spam {
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

                    #input[type="submit"]{

                    }

                    /**- Fim da estrutura do formulario */

                    /**desenho do lado da folha*/
                    /*.furoDaFolha{
                        width:40px;
                        height:40px;
                        margin:22px 0 5px -70px;
                        position:absolute;

                        border-radius:50%;

                        background-color:#130d06;

                        box-shadow:
                            0 75px 0 #130d06,
                            0 150px 0 #130d06,
                            0 225px 0 #130d06,
                            0 300px 0 #130d06,
                            0 375px 0 #130d06,
                            0 450px 0 #130d06,
                            0 525px 0 #130d06,
                            0 600px 0 #130d06,
                            0 675px 0 #130d06;
                    }
                     .rasgadoDaFolha{
                       width:60px;
                         height:22px;
                         margin:32px 0 5px -115px;
                         position:absolute;

                         border-radius:0 15% 15% 0;

                      background-color:#130d06;

                     box-shadow:
                    0 75px 0 #130d06,
                    0 150px 0 #130d06,
                    0 225px 0 #130d06,
                    0 300px 0 #130d06,
                    0 375px 0 #130d06,
                    0 450px 0 #130d06,
                    0 525px 0 #130d06,
                    0 600px 0 #130d06,
                    0 675px 0 #130d06;
                     }*/
                </style>

                <div id="corpo">
                    <div class="furoDaFolha"></div>
                    <div class="rasgadoDaFolha"></div>
                    <form id="forms" action="fazAlgo" method="post">
                        <fieldset>
                            <label for="nome">Nome:</label>
                            <input id="inputm" type="text"   onkeypress="return OnEnter(event);" id="nome[]" name="nome" />
                            <div id='Inpusts'></div>
                            <input id="inputm" type="button" value="Escrever"/>
                        </fieldset>
                    </form>
                    <script language="javascript">

                        function getfocus()
                        {
                            document.getElementsByName('nome').focus();
                        }

                        function OnEnter(evt)
                        {
                            var key_code = evt.keyCode ? evt.keyCode :
                                    evt.charCode ? evt.charCode :
                                    evt.which ? evt.which : void 0;


                            if (key_code == 13)
                            {
                                var input = "<input id='inputm' type='text' onclick='getfocus()'  onkeypress='return OnEnter(event);' id='nome[]' name='nome' />";
                                $('#Inpusts').append(input);
                                getfocus('input');
                            }


                        }


                    </script>
                </div>
            </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
