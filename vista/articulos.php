<?php include_once 'layouts/header.php'; ?>
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/style.css"/>-->
    <title>Apuntes</title>

    <?php include_once 'layouts/nav.php';?>

<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="confirmar-eliminacion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmar-eliminacion">Confirmar eliminación</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">        
        <div class="alert alert-success text-center" id='confirmado' style='display:none'>
            <span><i class="fas fa-check m-1"></i>Artículo eliminado</span>
        </div>
        <div class="alert alert-danger text-center" id='rechazado' style='display:none'>
            <span><i class="fas fa-times m-1"></i>Artículo rechazada</span>
        </div>
        <form id="form-confirmar-borrado">
            <div class="input-group mb-3">
                <div class="input-grup-prepend">
                    <span class="input-group-text" id="nombre-articul"> ¿Borrar?</span>
                </div>
                <input type="hidden" id="id_articulo">
                <input type="hidden" id="funcion">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn bg-gradient-primary">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="crearArticulo" tabindex="-1" role="dialog" aria-labelledby="crear-articulo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Nuevo artículo</h3>
          <button data-dismiss="modal" aria-label="close" class="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card-body">
          <div class="alert alert-success text-center" id='add-articulo' style='display:none'>
              <span><i class="fas fa-check m-1"></i>Artículo añadido</span>
          </div>
          <div class="alert alert-danger text-center" id='noadd-articulo' style='display:none'>
              <span><i class="fas fa-times m-1"></i>El artículo ya existe en el sistema</span>
          </div>
          <div class="alert alert-success text-center" id='edit-articulo' style='display:none'>
              <span><i class="fas fa-check m-1"></i>Artículo editado</span>
          </div>
          <form id="form-crear-articulo">
            <div class="form-group">
              <label for="nombre-articulo">Nombre</label>
              <input id="nombre-articulo" type="text" class="input form-control" placeholder="Nombre del artículo" required>
              <input type="hidden" id="id_editar_art">
              <label class="mt-2" for="contenido-articulo">Contenido</label>
              <textarea name="contenido-articulo" id="contenido-articulo" class="form-control" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
          <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="verArticulo" tabindex="-1" role="dialog" aria-labelledby="ver-articulo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title" id="nombre-articulo-title">Título artículo</h3>
          <button data-dismiss="modal" aria-label="close" class="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card-body">
              <label class="mt-2" for="nombre-articulo" id="ver-nombre-articulo">Título artículo</label>
              <p id="ver-contenido-articulo">Contenido</p>
        </div>
        <div class="card-footer">
          <button type="button" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    	<!-- Content Header (Page header) -->
		<section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="fw-bolder text-center"> Apuntes </h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
		</section>
    
        <!-- Main content -->
    <section class="content">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <a href="../index.php" class="btn btn-success">Inicio</a>
                <button type="button" data-toggle="modal" data-target="#crearArticulo" class="btn bg-gradient-primary m-2">Nuevo</button>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Búsqueda de artículos</h3>
                    <div class="input-group">
                        <input type="text" id="buscar" placeholder="Nombre del artículo"class="form-control float-left">
                        <div class="input-group-append">
                            <button class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <table class="table table-hover text-nowrap">
                    <thread class="table-success">
                      <tr>
                        <th>Acción</th>
                        <th>Nombre</th>
                      </tr>
                    </thread>
                    <tbody class="table-active" id="laboratorios">

                    </tbody>
                  </table>
                  <div class="row">
                    <div id="articulos" class="row d-flex align-items-stretch">

                    </div>
                  </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
            
        </div> <!-- /container -->
    </section>
    <!-- /.content -->
    </div>
  	<!-- /.content-wrapper -->

<?php include_once 'layouts/footer.php';?>

<script src='../js/articulos.js'></script>