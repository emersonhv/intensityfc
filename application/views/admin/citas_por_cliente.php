<div class="row" ng-controller="CitasCliente">
    <!-- /.col -->
    <div class="col-md-12">
		<?php if($mensaje != NULL) { ?>
			<div class="callout <?php echo $mensaje['tipo'];?>">
                <p><?php echo $mensaje['msg'];?></p>
            </div>
		<?php } ?>
		<ul class="timeline">
       <!-- timeline time label -->
			<?php if($cliente != NULL) { ?>
			<li class="time-label">
          <span class="bg-green">
  				  <?php echo $cliente['name']; ?>
          </span>
      </li>
			<?php } ?>
      <!-- /.timeline-label -->
			<?php
          date_default_timezone_set ("America/Bogota");
          $index=0;
          if($citas_x_plan != NULL) {
            foreach ($citas_x_plan as $item) {
              $index++;
                ?>
                <li>

          				<i class="fa fa-calendar-check-o bg-blue"></i>
          				<div class="timeline-item">
          					<h3 class="timeline-header">
                      <!--<button type="button" class="btn bg-green" data-toggle="collapse" data-target="#ver_cita<?php echo $index;?>">Ver Citas</button>-->
                      Plan: <a  href="#" data-toggle="collapse" data-target="#ver_cita<?php echo $index;?>"><?php echo $item['plan']. " - "; ?></a>
                      Fecha inicial: <?php echo  " ". date('d-m-Y',strtotime($item['primera_cita'])); ?>
                      <span class="pull-center-container">
                        <small class="label pull-center bg-green">Completadas: <?php echo  " ". $item['citas_completadas']; ?></small>
                        <small class="label pull-center bg-yellow">Pendientes: <?php echo  " ". $item['citas_pendientes'];  ?></small>
                        <small class="label pull-center bg-blue">Total Citas: <?php echo  " ". $item['total_citas']; ?></small>
                        <!--small class="label pull-center bg-red">Canceladas: <?php echo  " ". $item['citas_canceladas']; ?></small-->
                      </span>
          					</h3>
                    <div class="timeline-body">
                        <div id="ver_cita<?php echo $index;?>" class="collapse">
                          <table class="table table-striped">
                              <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Estado</th>
                                <th>Ver cita</th>
                              </tr>
                        <?php
                        foreach ($item['citas'] as $cita) {
                          //if ($cita['estado'] == 0) {
                        ?>
                            <tr>
                                <td> <?php echo date("l d \of M \of Y", strtotime($cita['fecha']));?> </td>
                                <td> <?php echo date("h:i A",strtotime($cita['hora'])); ?></td>
                                <td> <small class="label pull-center <?php echo ($cita['estado'] == 1) ? "bg-green" : "bg-yellow"; ?>"><?php echo ($cita['estado'] == 1) ? "Completada" : "Pendiente"; ?></small></td>
                                <td><a class="" href="../../cita/<?php echo $cita['id']; ?>"> Ver Cita </a></td>
                            </tr>
                        <?php
                          //}
                        }
                        ?>
                        </table>
                        </div>
                    </div>
                  </div>
                </li>
                <?php

            }
          }

      ?>

            <!-- timeline item -->

            <!-- END timeline item -->
          <li>
            <i class="fa fa-clock-o bg-gray"></i>
          </li>
        </ul>
	</div>
</div>
