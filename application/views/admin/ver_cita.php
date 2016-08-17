<div class="row" ng-controller="Cita">
    <!-- /.col -->
    <div class="col-md-12">

      <div class="callout" ng-show="mensaje.msg" ng-class="mensaje.tipo">
        <p>{{mensaje.msg}}</p>
      </div>
      <div class="text-red" ng-init="idCita = <?php echo $cita['id'];?>">
         <span><b>CLIENTE:</b> <?php echo $cita['nombre_cliente']; ?> </span><br>
         <span><b>PLAN:</b> <?php echo $cita['nombre_plan']; ?> </span><br>
         <span><b>FECHA:</b> <?php echo $cita['fecha']; ?> </span><br>
         <span><b>HORA:</b> <?php echo $cita['hora']; ?> </span><br>
         <span><b>ESTADO ACTUAL:</b> <?php echo ($cita['estado'] == "0") ? "Pendiente" : "Completada"; ?> </span><br/><br/>
         <a href="" class="btn btn-danger" ng-click="cancelar_cita()"> Cancelar Cita </a>
         <a href="" class="btn btn-success" ng-click="completar_cita()"> Cita Asistida </a>
      </div>

        <div class="programadas" > <!--ng-show="tipo == 1"-->
           <!--h2>Programadas</h2-->
           <form ng-submit="editar_cita()">
             <div class="form-group">
                <label>Nueva fecha:</label>
                <div class="input-group">
                  <input type="text" class="datepicker form-control dateepicker" ng-model="fecha" placeholder="yyyy-mm-dd - Ingrese fecha deseada">
                  <div class="input-group-addon">
                     <i class="fa fa-calendar"></i>
                  </div>
                </div>
             </div>
              <div class="form-group">
                 <label>Nueva hora:</label>
                 <div class="input-group">
                   <input type="text" class="form-control timepicker" ng-model="hora" placeholder="hh:mm:ss - Ingrese formato 24h">
                   <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                   </div>
                 </div>
              </div>
              <div class="form-group">
                 <button type="submit" class="btn btn-primary btn-lg btn-block">
                   <i class="fa fa-floppy-o"></i> Guardar
                 </button>
              </div>
           </form>
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>
