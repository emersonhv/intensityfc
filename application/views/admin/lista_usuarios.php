<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Usuarios
        </h1>
        <?php if(isset($mensaje)){ ?>
            <?php if($mensaje != null){ ?>
                <?php if($tipo == "success"){ ?>
                    <div class='alert alert-success alert-dismissible' role='alert' >
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
                        <?php echo $mensaje; ?>
                    </div>
                <?php }else{ ?>
                    <div class='alert alert-danger alert-dismissible' role='alert' >
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                        <?php echo $mensaje; ?>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading"><h4><?php echo $titulo; ?></h4></div>
            <div class="panel-body">
                <table class="table table-hover table-striped table-bordered display nowrap datatable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo electr&oacute;nico</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php if($usuarios != NULL){ ?>
                    <?php foreach($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo $usuario['nombre']; ?></td>
                            <td><?php echo $usuario['correo']; ?></td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="/editar_usuario/<?php echo $usuario['id']; ?>">Editar</a>
                                <a class="btn btn-danger btn-xs btn-eliminar-usuario" href="/eliminar_usuario/<?php echo $usuario['id']; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
					<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>