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
<a type="button" class="btn btn-primary btn-flat" href="cliente">
    <spam>Nuevo Plan</spam> <i class="fa fa-pencil"></i>
</a>
<div class="row" ng-controller="VerPlanes" ng-init="indx = 1">
<div class="input-group margin">
                <input type="text" class="form-control" ng-model="nombrecl" placeholder="Ingrese nombre de cliente">
            <span class="input-group-btn">
                <button type="button" class="btn btn-info btn-flat" ng-click="buscarCliente(nombrecl)">Buscar</button>
            </span>
            <!--div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div-->
        </div>
        
<table class="table table-bordered table-hover">
    <tbody>
    <tr>
        <th>
            <i class="fa fa-check-square-o"></i>
        </th>
        <th>Nombre</th>
        <th>Referencia</th>
        <th>Cantidad Citas</th>
        <th>Color</th>
    </tr>
    <tr ng-repeat="plan in planes | filter:nombrecl">
        <td>
            <!--input class="" type="radio" id="cliente{{$index+1}}" name="cliente" value="{{cliente.id}}" ng-click="seleccionarClie(this)"-->
            <!--a id="cliente{{$index+1}}" name="cliente" value="{{cliente.id}}" class="btn btn-info btn-flat" href="prueba.intensityfc.com/citas_cliente/:id">Ver Citas</a-->
            <a id="plan{{$index+1}}" name="plan" value="{{plan.id}}" class="label btn-info" href="plan/{{ plan.id }}">Ver Plan</a>
            <a id="plan{{$index+1}}" name="plan" value="{{plan.id}}" class="label btn-info" href="plan/{{ plan.id }}">Editar</a>
        </td>
        <td><a>{{plan.name}}</a></td>
        <td>{{plan.description.split('\n')[0]}}</td>
        <td>{{plan.price[0].price | currency}} COP</td>
    </tr>
    </tbody>
</table>


    <!-- /.col -->
</div>