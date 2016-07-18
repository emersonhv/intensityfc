<div class="row" ng-controller="ConfigurarPlanes" >

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
            <form method="POST" ng-submit="configurarPlan()">
              <div class="box-body">
				
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input class="form-control" ng-model="plan.nombre" id="nombre" name="nombre" placeholder="Dato requerido" type="text" required/>
                </div>
                <div class="form-group">
                  <label for="nit">Referencia</label>
                  <input class="form-control" ng-model="plan.referencia" id="referencia" name="referencia" placeholder="" type="text"/>
                </div>
				        <div class="form-group">
                  <label for="direccion">Descripcion</label>
                  <input class="form-control" ng-model="plan.descripcion" id="descripcion" name="descripcion" placeholder="" type="text"/>
                </div>
				        <div class="form-group">
                  <label for="ciudad">Valor</label>
                  <input class="form-control" ng-model="plan.valor" id="valor" name="valor" placeholder="Valor" type="text"/>
                </div>
				      <div class="form-group">
                  <label for="email">Cantidad clases</label>
                  <input class="form-control" ng-model="plan.cantidad_citas" id="cantidad_citas" name="cantidad_citas" placeholder="Cantidad Citas" type="text"/>
                </div>
              </div>
              <div class="form-group">
                  <label for="email">Cantidad clases por Mes</label>
                  <input class="form-control" ng-model="plan.clasesxsemana" id="clasesxsemana" name="clasesxsemana" placeholder="Clases por Semana" type="text"/>
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