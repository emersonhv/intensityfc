<!-- tab-pane -->
<div class="row" ng-controller="Clientes_Lista" >
   <div class="col-md-12 col-sm-12 col-xs-12">
   <div class="box box-danger">

            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                 <a type="button" class="btn btn-primary btn-flat" href="cliente">
                    <spam>Nuevo Cliente</spam> <i class="fa fa-pencil"></i>
                 </a>
            </div>

            <!-- /.box-header -->

            <!-- form start -->
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
                <th>C.C. / NIT</th>
                <th>Email</th>
            </tr>
            <tr ng-repeat="cliente in clientes | filter:nombrecl">
                <td>
                    <!--input class="" type="radio" id="cliente{{$index+1}}" name="cliente" value="{{cliente.id}}" ng-click="seleccionarClie(this)"-->
                    <!--a id="cliente{{$index+1}}" name="cliente" value="{{cliente.id}}" class="btn btn-info btn-flat" href="prueba.intensityfc.com/citas_cliente/:id">Ver Citas</a-->
                    <a id="cliente{{$index+1}}" name="cliente" value="{{cliente.id}}" class="label btn-info" href="citas/cliente/{{ cliente.id }}">Ver Citas</a>
                    <a id="cliente{{$index+1}}" name="cliente" value="{{cliente.id}}" class="label btn-info" href="cliente/{{ cliente.id }}">Editar</a>
                </td>
                <td><a>{{cliente.name}}</a></td>
                <td>{{cliente.nit}}</td>
                <td>{{cliente.email}}</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>