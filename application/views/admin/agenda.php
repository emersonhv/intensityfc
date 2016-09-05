<style type="text/css">
.fc-popover{
    width: 100% !important;
    position: absolute;
    top: 24px !important;
    left: 3px !important;
}
.icon{
    position: absolute;
    right: 0;
}

</style>
<div class="row" ng-controller="Agenda">
    <!-- /.col -->
    <div class="col-md-12">
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
