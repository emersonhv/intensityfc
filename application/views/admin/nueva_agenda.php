<div class="row" ng-controller="Agenda">
    <div class="col-md-3">
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Programa una Clase</h3>
            </div>
            <div class="box-body">
              <div class="box-footer">
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#nueva_cita">Programada</button>
				<button type="button" class="btn btn-block btn bg-navy">Manual</button>
              </div>
            </div>
          </div>
        </div>
        <!-- example-modal -->
        <div class="example-modal">
            <div class="modal" id="nueva_cita" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Nueva Clase</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Drop down Clientes -->
                        <label>Cliente</label>
                        <select class="form-control select2" id="cbxClientes" style="width: 100%;" ng-controller="Clientes_Lista">
                            <option value="{{cliente.id}}" ng-repeat="cliente in clientes">{{ cliente.name }}</option>
                        </select>
                        
                        <label>Minimal</label>
                        <div class="row" ng-controller="Clientes_Lista">
                            <div class="input-group margin">
                                    <input type="text" class="form-control" ng-model="nombrecl" placeholder="Ingrese nombre de cliente">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" ng-click="buscarCliente(nombrecl)">Buscar</button>
                                </span>
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
                                        <input class="" type="radio" id="cliente{{$index+1}}" name="cliente" value="{{cliente.id}}" ng-click="seleccionarClie(this)">
                                    </td>
                                    <td><a>{{cliente.name}}</a></td>
                                    <td>{{cliente.nit}}</td>
                                    <td>{{cliente.email}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /Drop down Clientes -->

                        <!-- Drop down Plan -->
                        <!-- /Drop down Plan -->

                        <!-- Drop down Datos Cita -->
                        <!-- /Drop down Datos Cita -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <!-- /.modal -->
      </div>
      <!-- /.example-modal -->
        <!-- /.col -->
    <div class="col-md-9">
        <?php if (isset($mensaje)) {?>
        <div class="alert alert-<?php isset($tipo) ? $tipo : ""; ?> alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php isset($mensaje) ? $mensaje : ""; ?>
        </div>
        <?php } ?>
        <div class="box box-danger">
            <div class="box-body no-padding">
                <!-- PLANES -->
                <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>
<script>
    $(function(){
        //Initialize Select2 Elements
        $(".select2").select2();
    });
</script>
