<?php
    //print_r($cliente);die;
    $controller ="";
    if($accion == "Guardar" ) {
      $ng_controller = "ng-controller='CrearCliente'";
      $ng_submit = "ng-submit='crearCliente()'";
    }
    if ($accion == "Actualizar" ) {
      $ng_controller = "ng-controller='ActualizarCliente'";
      $ng_submit = "ng-submit='actualizarCliente()'";
    }
?>
<div class="row" <?php echo $ng_controller; ?>>

   <div class="col-md-12">
		<div class="alert {{datacli.tipo}}" ng-show="datacli.tipo">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			{{datacli.msg}}
		</div>
		<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" <?php echo $ng_submit; ?>>
              <div class="box-body">
                <input type="hidden" ng-model="cliente.id" id="id" value="<?php echo (isset($cliente['id']) == null ? "" : $cliente['id']); ?>" />
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input class="form-control" ng-model="cliente.name" id="name" name="name" placeholder="Dato requerido" value="<?php echo (isset($cliente['name']) ?  $cliente['name'] : ""); ?>" type="text" required/>
                </div>
                <div class="form-group">
                  <label for="identification">Nit/CC</label>
                  <input class="form-control" ng-model="cliente.identification" id="identification" name="identification" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="address">Dirección</label>
                  <input class="form-control" ng-model="cliente.address" id="address" name="address" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="ciudad">Ciudad</label>
                  <input class="form-control" ng-model="cliente.ciudad" id="ciudad" name="ciudad" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="email">Correo electrónico</label>
                  <input class="form-control" ng-model="cliente.email" id="email" name="email" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="phonePrimary">Teléfono 1</label>
                  <input class="form-control" ng-model="cliente.phonePrimary" id="phonePrimary" name="phonePrimary" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="phoneSecondary">Teléfono 2</label>
                  <input class="form-control" ng-model="cliente.phoneSecondary" id="phoneSecondary" name="phoneSecondary" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="fax">Fax</label>
                  <input class="form-control" ng-model="cliente.fax" id="fax" name="fax" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="mobile">Celular</label>
                  <input class="form-control" ng-model="cliente.mobile" id="mobile" name="mobile" placeholder="" type="text"/>
                </div>
                <div class="form-group">
                  <label for="observations">Observaciones</label>
                  <textarea class="form-control" ng-model="cliente.observations" id="observations" name="observations" rows="3" placeholder="..."></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary">Guardar</button>
	              <button type="button" class="btn btn-block btn-warning" ng-click="limpiarForm()">Limpiar formulario</button>
              </div>
            </form>
          </div>
   </div>
</div>
