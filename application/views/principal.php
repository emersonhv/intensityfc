<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet" />
        <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <?php echo $map['js'];?>
        <title>.::CDV::.</title>
        <script type="text/javascript">
            $(document).ready(function() {
                setTimeout(function() {
                    $("#mensaje").fadeOut(1500);
                }, 3000);
            });
        </script>
    </head>
    <body>
        <nav id="navbar-example" class="navbar navbar-default navbar-static" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Casas de Vida</a>
                </div>
                <div class="collapse navbar-collapse bs-example-js-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">CDV <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Buscar en Mapa</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Crear CDV</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Crear Lider</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="fat-menu" class="dropdown">
                            <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo $CI->session->userdata('nombre'); ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="salir">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <?php echo isset($mensaje) ? $mensaje : $mensaje = ''; ?>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mapa</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $map['html'];?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-4">
                    <form role="form" onsubmit="return false;">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Input 1</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Input 2</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
