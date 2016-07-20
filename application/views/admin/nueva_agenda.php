<div class="row" ng-controller="Agenda">
    <div class="col-md-3">
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Programa una Clase</h3>
            </div>
            <div class="box-body">
              <div class="box-footer">
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal">Programada</button>
				<button type="button" class="btn btn-block btn bg-navy">Manual</button>
              </div>
            </div>
          </div>
        </div>
        <!-- example-modal -->
        <div class="example-modal">
            <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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

