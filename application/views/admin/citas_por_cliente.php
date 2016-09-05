<?php /*echo "<pre>";print_r($planes_comprados) ;*echo "</pre>";*/ ?>
<div class="row" ng-controller="CitasCliente">
    <!-- /.col -->
    <div class="col-md-12">
    <?php
    function fecha_espanol($fecha){
        $dias[] = array('Monday' => 'Lunes',
                        'Tuesday' => 'Martes',
                        'Wednesday' => 'Miercoles',
                        'Thursday' => 'Jueves',
                        'Friday' => 'Viernes',
                        'Saturday' => 'Sabado',
                        'Sunday' => 'Domingo',
                        );
        $dias_ = array_shift($dias);
        $meses[] =array('January' => 'Enero',
                        'February' => 'Febrero',
                        'March' => 'Marzo',
                        'April' => 'Abril',
                        'May' => 'Mayo',
                        'June' => 'Junio',
                        'July' => 'Julio',
                        'August' => 'Agosto',
                        'September' => 'Septiembre',
                        'October' => 'Octubre',
                        'November' => 'Noviembre',
                        'December' => 'Diciembre',
                        );
            $meses_ = array_shift($meses);
            $dia = $dias_[date ('l', strtotime($fecha))] . " ". date ('d', strtotime($fecha));
            $mes = $meses_[date ('F', strtotime($fecha))];
            $ano = date ('Y', strtotime($fecha));
            $nueva_fecha = $dia . " de ".$mes ." de ".$ano;

            return $nueva_fecha;
    }

    if($mensaje != NULL) { ?>
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
          $index=0;
          if($planes_comprados != NULL) {
            foreach ($planes_comprados as $paquetes) {
                foreach ($paquetes as $paquete) {
                  $index++;
                    ?>
                    <li>
                      <i class="fa fa-calendar-check-o bg-blue"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <!--<button type="button" class="btn bg-green" data-toggle="collapse" data-target="#ver_cita<?php echo $index;?>">Ver Citas</button>-->
                          Plan: <a  href="#" data-toggle="collapse" data-target="#ver_cita<?php echo $index;?>"><?php echo $paquete[0]['nombre_plan']. " - "; ?></a>
                          Fecha inicial: <?php echo  " ". date('d-m-Y',strtotime($paquete[0]['fecha'])); ?>
                          <?php
                          $cant_pendientes = 0; $cant_completadas=0; $cant_canceladas=0;$cant_aplazadas=0;$total=0;
                          foreach ($paquete as $contador){
                            $total = $total+1;
                            $cant_pendientes  = ($contador["estado"] == 0) ? $cant_pendientes + 1 : $cant_pendientes;
                            $cant_completadas = ($contador["estado"] == 1) ? $cant_completadas + 1 : $cant_completadas;
                            $cant_canceladas  = ($contador["cancelada"] == 1) ? $cant_canceladas + 1 : $cant_canceladas;
                            $cant_aplazadas   = ($contador["aplazada"] == 1) ? $cant_aplazadas + 1 : $cant_aplazadas;
                          }
                          ?>
                          <span class="pull-center-container">
                            <small class="label pull-center bg-green">Completadas: <?php echo  " ".$cant_completadas?></small>
                            <small class="label pull-center bg-yellow">Pendientes: <?php echo  " ". ($cant_pendientes - $cant_canceladas - $cant_aplazadas)  ?></small>
                            <small class="label pull-center bg-red">Canceladas: <?php echo  " ".$cant_canceladas  ?></small>
                            <small class="label pull-center bg-blue">Total Citas: <?php echo  " ".$total ?></small>
                            <!--small class="label pull-center bg-red">Canceladas: <?php echo  " ". $cant_aplazadas ?></small-->
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
                            $a=0;
                            foreach ($paquete as $cita) {
                                $color=""; $estado = "";
                                if ($cita['estado'] == "1") {
                                    $color="bg-green";
                                    $estado ="Completada";
                                }
                                if ($cita['estado'] == "0")  {
                                  $color="bg-yellow";
                                  $estado ="Pendiente";
                                }
                                if ($cita['cancelada'] == "1")  {
                                  $color="bg-red";
                                  $estado ="Cancelada";
                                }
                            ?>
                                <tr>
                                    <td> <?php $fecha_ = fecha_espanol($cita['fecha']); echo $fecha_;?> </td>
                                    <td> <?php echo date("h:i A",strtotime($cita['hora'])); ?></td>
                                    <td>
                                      <small class="label pull-center <?php echo $color; ?>">
                                        <?php echo $estado; ?>
                                      </small>
                                    </td>
                                    <td><a class="" href="../../cita/<?php echo $cita['id']; ?>"> Ver Cita </a></td>
                                </tr>

                            <?php


                            }
                            ?>
                            </table>
                            </div>
                        </div>
                      </div>
                    </li>

                    <?php
                }

                ?>

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
