<!DOCTYPE html>
<html lang="en">
<?php if($CI->session->userdata('logged_in') != TRUE){
	redirect('/admin/inicio','refresh');
}?>

<head>
	<?php
	$this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
	$this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
	$this->output->set_header("Pragma: no-cache");
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Panel Admin - <?php echo isset($titulo) ? $titulo : ""; ?></title>

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url("assets/admin/css/bootstrap.min.css"); ?>" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo base_url("assets/admin/css/sb-admin.css"); ?>" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?php echo base_url("assets/css/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
	<!--link href="<?php echo base_url("assets/datatable/jquery.dataTables.css"); ?>" rel="stylesheet" type="text/css"-->
	<link href="<?php echo base_url("assets/datatable/dataTables.responsive.css"); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url("assets/datatable/dataTables.bootstrap.css"); ?>" rel="stylesheet" type="text/css">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

<div id="wrapper">

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<img id="img-logo2" class="img-responsive" width="200" src="<?php echo base_url('assets/images/logofin.png'); ?>">
		</div>
		<!-- Top Menu Items -->
		<ul class="nav navbar-right top-nav">

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $CI->session->userdata('nombre'); ?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li class="disabled">
						<a href="#"> <?php echo date('D').", ".date('d')." of ".date('M')." of ". date('Y'); ?> </a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="salir"><i class="fa fa-fw fa-power-off"></i> Cerrar sesion</a>
					</li>
				</ul>
			</li>
		</ul>
		<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav side-nav">
				<li>
					<a href="#" data-toggle="collapse" data-target="#usuarios">
						<i class="fa fa-users"></i> Usuarios <i class="fa fa-fw fa-caret-down"></i>
					</a>
					<ul id="usuarios" class="collapse">
						<li>
							<a href="/listado_usuarios"><i class="fa fa-th-list"></i> Listado de usuarios</a>
						</li>
						<li>
							<a href="/crear_usuario"><i class="fa fa-user-plus"></i> Crear usuario</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" data-toggle="collapse" data-target="#noticias">
						<i class="fa fa-newspaper-o"></i> Noticias <i class="fa fa-fw fa-caret-down"></i>
					</a>
					<ul id="noticias" class="collapse">
						<li>
							<a href="/listado_noticias"><i class="fa fa-th-list"></i> Listado de noticias</a>
						</li>
						<li>
							<a href="/crear_noticia"><i class="fa fa-plus-circle"></i> Crear noticia</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</nav>

	<div id="page-wrapper">

		<div class="container-fluid">
			<?php if($CI->session->userdata('logged_in')){
				$this->load->view($contenido);
			 }?>
		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url("assets/admin/js/jquery.js"); ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url("assets/admin/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/datatable/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/datatable/dataTables.responsive.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/datatable/dataTables.bootstrap.min.js"); ?>"></script>

<script type="application/javascript">
	$(".btn-eliminar-usuario").click(function (event) {
		var SiNo = confirm("Desea eliminar este usuario?");
		if(!SiNo)
			event.preventDefault();
	});
	$(".btn-eliminar-noticia").click(function (event) {
		var SiNo = confirm("Desea eliminar esta noticia?");
		if(!SiNo)
			event.preventDefault();
	});
    $(document).ready(function(){
        $('.datatable').DataTable({
            responsive: true,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });
    });
</script>
</body>

</html>
