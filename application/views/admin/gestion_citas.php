<?php $index = 0; ?>
<div class="row" ng-controller="GestionCitas" ng-init="idx">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box box-danger">
        <div class="box box-body">
          <div class="input-group margin">
              <input type="text" class="form-control" ng-model="nombrecl" placeholder="Ingrese un valor para filtrar">
              <span class="input-group-btn">
                  <button type="button" class="btn btn-info btn-flat" ng-click="buscarCitas(nombrecl)">Buscar</button>
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
                      <th>Cliente</th>
                      <th>Cita</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Ver cita</th>
                  </tr>
                  <tr ng-repeat="cit in citas | filter:nombrecl">
                  <td>{{cit.id}}
                      <!--input class="" type="radio" id="cliente{{$index+1}}" name="cliente" value="{{cliente.id}}" ng-click="seleccionarClie(this)"-->
                      <!--a id="cliente{{$index+1}}" name="cliente" value="{{cliente.id}}" class="btn btn-info btn-flat" href="prueba.intensityfc.com/citas_cliente/:id">Ver Citas</a-->
                  </td>
                  <td><a>{{cit.nombre_cliente}}</a></td>
                  <td>{{cit.nombre_plan}}</td>
                  <td>{{cit.fecha}}</td>
                  <td>{{cit.hora }}</td>
                  <td><a class="btn bg-green label" href="cita/{{cita.id}}">Ver Cita <a/></td>
              </tr>
              </tbody>
          </table>
        </div>
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
        </div>
    </div>
  <!-- /.box-body -->

  </div>
</div>
