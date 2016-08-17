<div class="row" >
    <div class="col-md-3" ng-controller="ClienteController">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h4 style="text-align:center">Cliente</h4>
              <input type="text" class="form-control" ng-model="nombrecl" placeholder="Ingrese nombre de cliente">
              <!--select class="form-control select2" multiple="multiple" data-placeholder="Ingrese nombre de cliente" style="width: 100%;">
                  <option ng-repeat="cliente in clientes" value="{{cliente.id }}">
                     {{cliente.name}}
                  </option>
              </select-->
            </div>
            <div class="box-body" style="width:100%; height: 200px; overflow-y: scroll;">

              <table class="table table-bordered">
                <tbody>
                  <tr ng-repeat="cliente in clientes | filter:nombrecl">
                    <td>
                      <a class="btn cliSel" idCliente="{{cliente.id}}" ng-click="consultarCliente();">
                        <i class="fa fa-search"></i> - <span> {{cliente.name}}</span> </a>
                    </td>
                   </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
    <div class="col-md-9" ng-controller="Agenda">
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
