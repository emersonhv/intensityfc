<div class="row" ng-controller="Clientes" >

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
            <form method="POST" ng-submit="crearCliente()">
              <div class="box-body">
				
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input class="form-control" ng-model="cliente.nombre" id="nombre" name="nombre" placeholder="Dato requerido" type="text" required/>
                </div>
                <div class="form-group">
                  <label for="nit">Nit/CC</label>
                  <input class="form-control" ng-model="cliente.nit" id="nit" name="nit" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input class="form-control" ng-model="cliente.direccion" id="direccion" name="direccion" placeholder="" type="text"/>
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
                  <label for="tel1">Teléfono 1</label>
                  <input class="form-control" ng-model="cliente.tel1" id="tel1" name="tel1" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="tel2">Teléfono 2</label>
                  <input class="form-control" ng-model="cliente.tel2" id="tel2" name="tel2" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="fax">Fax</label>
                  <input class="form-control" ng-model="cliente.fax" id="fax" name="fax" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="celular">Celular</label>
                  <input class="form-control" ng-model="cliente.celular" id="celular" name="celular" placeholder="" type="text"/>
                </div>
                <div class="form-group">
                  <label for="observaciones">Observaciones</label>
                  <textarea class="form-control" ng-model="cliente.observaciones" id="observaciones" name="observaciones" rows="3" placeholder="..."></textarea>
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