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
			<?php if($citas != NULL) { ?>
			<?php foreach ($citas as $cita) { ?>
            
            <!-- timeline item -->
            <li>
				<i class="fa <?php echo $cita['estado'] == '0' ? 'fa-calendar-check-o bg-blue' : 'fa-calendar-times-o bg-red'; ?>"></i>
				<div class="timeline-item">
					<h3 class="timeline-header">
						<a href="#"><?php echo $cita['nombre_plan']; ?></a>
						<?php echo "Fecha: ". $cita['fecha']."  "; ?>
						<?php echo "Hora: ".$cita['hora']; ?>
					</h3>
					<?php if($cita['estado'] == '0'){ ?>
					<div class="timeline-footer">
						<!--a class="btn btn-primary btn-xs">Aplazar</a-->
						<a class="btn btn-danger btn-xs" href="/cita/<?php echo $cita['id']; ?>/cliente/<?php echo $cita['id_cliente']; ?>" >Terminar cita</a>
					</div>
					<?php } ?>
				</div>
            </li>
			<?php } ?>
			<?php } ?>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
        </ul>
	</div>
</div>