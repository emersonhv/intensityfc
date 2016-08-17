<div class="row" ng-controller="VerPlanes">

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
            
            <form method="POST" ng-submit="crearPlan()">
              <div class="box-body" ng-init="idPlan = <?php echo (isset($plan['id']) == null ? "" : $plan['id']); ?>">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input type="text"  class="form-control" ng-model="plan.name"  id="name" name="name" value="<?php echo (isset($plan['name']) == null ? "" : $plan['name']); ?>" required/>
                </div>
                <div class="form-group">
                  <label for="referencia">Referencia</label>
                  <input type="text" class="form-control" ng-model="plan.reference" id="reference" name="reference" placeholder="" value="<?php echo (isset($plan['reference']) == null ? "" : $plan['reference']);?>"  />
                </div>
				        <div class="form-group">
                  <label for="description">Descripcion</label>
                  <input type="text" class="form-control" ng-model="plan.description" id="description" name="description" placeholder="" value="<?php echo (isset($plan['description']) == null ? "" : $plan['description']);?>" />
                </div>
				        <div class="form-group">
                  <label for="price">Valor</label>
                  <input  type="text" class="form-control" ng-model="plan.price" id="price" name="price" placeholder="Valor" value="<?php echo (isset($plan['price']) == null ? "" : $plan['price']);?>" />
                </div>
				      <div class="form-group">
                  <label for="cantidad_citas">Cantidad clases</label>
                  <input type="text" class="form-control" ng-model="plan.cantidad_citas" id="cantidad_citas" name="cantidad_citas" placeholder="Cantidad Citas" value="<?php echo (isset($plan['cantidad_citas']) == null ? "" : $plan['cantidad_citas']);?>" />
                </div>

              <div class="form-group">
                  <label for="clasesxsemana">Cantidad clases por Mes</label>
                  <input type="text" class="form-control" ng-model="plan.clasesxsemana" id="clasesxsemana" name="clasesxsemana" placeholder="Clases por Semana" value="<?php echo (isset($plan['clasesxsemana']) == null ? "" : $plan['clasesxsemana']);?>"/>
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
