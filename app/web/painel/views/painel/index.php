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
 
        <form>
            <textarea >
            </textarea>
            <input type="submit" value="Enviar">
        </form>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript" src="<?php echo $this->createUrl() ?>/app/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
             tinymce.init({
                // General options
                selector: 'textarea'
            });
 </script>
