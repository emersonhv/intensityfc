<!DOCTYPE html>
<html>

<head>
    <title>GYM</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.print.css'); ?>" media="print">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.css'); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/select2.min.css'); ?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->
    <style type="text/css">
        body{
            font-size: 16px !important;
        }
    </style>

</head>

<body class="hold-transition skin-blue fixed sidebar-mini" ng-app="agenda">

    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>N</b>LG</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Nombre</b>LOGO</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </nav>

        </header>
        <!--Menu izquierdo -->
        <?php $this->load->view($leftmenu); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><?php echo $titulo; ?> <small><?php echo $desc_titulo; ?></small></h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!--div class="callout callout-info">
                    <h4>Tip!</h4>

                    <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar is bigger than your content because it prevents extra unwanted scrolling.</p>
                </div-->
                <!-- Contenido principal -->
                <?php $this->load->view($contenido); ?>

            </section>

            <!-- /.content -->
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.0.1
            </div>
            <strong>Copyright &copy; 2016 <a target="_blank" href="http://intensityfc.com">Intesity Fitness Center</a>.</strong> All rights reserved.
        </footer>
    </div>

    <!-- jQuery 2.2.0 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/app.min.js'); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/fullcalendar/lang-all.js'); ?>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script src="//underscorejs.org/underscore-min.js"></script>
    <script src="<?php echo base_url("assets/dist/js/aplicacion.js"); ?>"></script>
	<script src="<?php echo base_url("assets/config.js"); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url("assets/plugins/select2/select2.full.min.js"); ?>"></script>
    
    <?php
    //if($CI->session->userdata('logged_in')){
        if(isset($javascript)){
            echo $javascript;
        }
    //}
    ?>
    <!-- Page specific script -->
    
</body>

</html>
