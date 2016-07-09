<style type="text/css">
	.fa-style{
		font-size: 50px;
		text-align: center;
		-o-transition: all .3s linear;
		color: gold;
	}
	.bg-purpure{
		background-color:#F514DB !important;
		color:white;
	}
	.bg-orange{
		background-color:#FF6300 !important;
		color:white;
	}
	.bg-blue{
		background-color:#3627FF !important;
		color:white;
	}
	.bg-pink{
		background-color:#FF27D2 !important;
		color:white;
	}
</style>
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
                  <label for="direccion">Dirección</label>
                  <input class="form-control" ng-model="plan.descripcion" id="descripcion" name="descripcion" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="ciudad">Ciudad</label>
                  <input class="form-control" ng-model="plan.valor" id="valor" name="valor" placeholder="" type="text"/>
                </div>
				<div class="form-group">
                  <label for="email">Correo electrónico</label>
                  <input class="form-control" ng-model="plan.cantidad_citas" id="cantidad_citas" name="cantidad_citas" placeholder="" type="text"/>
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

<hr/>
<div class="row" ng-controller="VerPlanes" ng-init="indx = 1">
    <!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12" ng-repeat="plan in planes">
        <!-- PLANES -->
        <div class="small-box {{color[$index]}}">
            <div class="inner" style="text-align: center;">
                <h3 style="text-align: center;">{{plan.name}}</h3>
                <!--i class="fa fa-star fa-style" ng-repeat="plan in planes | limitTo:$index+1"></i-->
            </div>
            <div class="" style="text-align: center;">
                <p>{{plan.description.split('\n')[0]}}</p>
                <p>{{plan.description.split('\n')[1]}}</p>
            </div>
            <a href="#" class="small-box-footer" style="font-size: 20px;">{{plan.price[0].price | currency}} COP</a>
        </div>
    </div>
    
    <!-- /.col -->
</div>