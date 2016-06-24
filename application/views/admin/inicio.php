<!DOCTYPE HTML>
<html lang="es">
	<head>
		<title>ADMIN - Bathymetric Solutions</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/bootstrap.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/sb-admin.css'); ?>">
        <style type="text/css">
            .img-centered{
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
	</head>
	<body>
        <img  id="img-logo" class="img-responsive img-centered" width="300" src="<?php echo base_url('assets/images/logofin.png'); ?>">
		<div class="modal-dialog" >
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" style="text-align: center;">Iniciar Sesi&oacute;n</h4>
				</div>
				<div class="modal-body">
					<?php if($mensaje != null){?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<?php echo $mensaje;?>
						</div>
					<?php }?>
					<form action="iniciar_sesion" method="POST">
						<div class="form-group">
							<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electr&oacute;nico" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contrase&ntilde;a" required>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Iniciar</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->

		<script type="text/javascript" src="<?php echo base_url('assets/admin/js/jquery.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/admin/js/bootstrap.min.js'); ?>"></script>
		<script>
			//$(document).ready(function(){
			//	$('#modalNews').modal({ keyboard: false });
			//});
		</script>
	</body>
</html>