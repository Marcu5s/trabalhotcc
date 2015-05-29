<?php $this->title = "Zuuf | DashBoard" ?>

<?php
print_r($_POST);
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
        <div class='box-body pad'>
            <script type="text/javascript" src="/vendor/tinymce/tinymce.min.js"></script>

            <script type="text/javascript">
                $(function () {
                    tinymce.init({selector: 'textarea', theme: "modern",
                        width: 300,
                        height: 300,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"]});





                }

            </script> 

            <form method="post" action="">
                <textarea>
              
                  

                </textarea>
            </form>


    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
