<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Noticias
        </h1>
        <div class="panel panel-default">
            <div class="panel-heading"><h4><?php echo $titulo; ?></h4></div>
            <div class="panel-body">
                <form action="/insertar_noticia" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo de noticia" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha de publicaci&oacute;n" required>
                    </div>
                    <div class="form-group">
                        <label>Noticia destacada</label><br>
                        <label class="radio-inline" for="n_interes_si">
                            <input type="radio" name="n_interes" id="n_interes_si" value="1" required > SI
                        </label>
                        <label class="radio-inline" for="n_interes_no">
                            <input type="radio" name="n_interes" id="n_interes_no" value="0" checked> NO
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="contenido">Contenido</label>
                        <textarea required class="form-control" name="contenido" id="contenido" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url_img">Imagen</label>
                        <input type="file" id="url_img" name="url_img">
                        <p class="help-block">Cargue una imagen de su computadora</p>
                    </div>

                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>