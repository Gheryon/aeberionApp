<?php
	include 'config.php';
	require_once('funcionesdb.php');
	$q = new Database();
	$q->connect();
	//$evento = $q->getevento($id);
	$q->disconnect();

  require_once('../modelo/personaje.php');
  $personaje = new Personaje();

	if(isset($_POST['id'])){
    $id=$_POST['id'];
    }else{
      header('Location: ../index.php');
    }




	include_once 'layouts/header.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Editar personaje</title>

<?php include_once 'layouts/nav.php';?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar personaje</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container">
      <div class="span10 offset1">
        <form id="form-create-personaje" class="row g-3 mt-3 position-relative needs-validation" action="createPersonaje.php" method="post" enctype="multipart/form-data">
          <div class="row justify-content-md-center">
            <div class="col-md-auto form-actions">
              <button type="submit" class="btn btn-success">Añadir</button>
              <a class="btn btn-danger" href="../index.php">Cancelar</a>
            </div>
          </div>
          <div class="row mt-3 mb-2 justify-content-md-center border fondoNombre">
            <div class="col-md-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text" name="Nombre" class="form-control" id="Nombre"required>
                <div class="invalid-feedback">
                  Nombre necesario.
                </div>
              </div>
            <div class="col-md-3">
              <label for="Apellidos" class="form-label">Apellidos</label>
              <input type="text" name="Apellidos" class="form-control" id="Apellidos">
            </div>
            <div class="col-md-2">
              <label for="sexo" class="form-label">Sexo</label>
              <select class="form-select" name="Sexo" id="inputSexo" required>
                <option selected disabled value="">Elegir</option>
                <option>Hombre</option>
                <option>Mujer</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="Especie" class="form-label">Especie</label>
              <select class="form-select" name="Especie" id="inputEspecie" required>
                <option selected disabled value="">Elegir</option>
                <option>Humanos</option>
                <option>Elfos</option>
                <option>Enanos</option>
                <option>Semielfos</option>
                <option>Gnomos</option>
              </select>
            </div>
              <div class="col-md-2">
                <label for="Retrato" class="form-label">Retrato</label>
                <input type="file" name="Retrato" class="form-control" id="Retrato"disabled>
              </div>
          </div>
          <!----------------------------------------------->
            <div class="row mt-2 justify-content-md-center border fondoMente">
              <div class="row mt-2">
                <div class="col">
                    <label for="Descripcion" class="form-label">Descripción física</label>
                    <textarea class="form-control" id="Descripcion" rows="1" aria-label="With textarea">
                    <?php //echo $evento['descripcion'] ?>
                    </textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col mt-2">
                    <label for="Personalidad" class="form-label">Personalidad</label>
                    <textarea class="form-control" id="Personalidad" rows="1"></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col mt-2">
                    <label for="Deseos" class="form-label">Principales deseos</label>
                    <textarea class="form-control" id="Deseos" rows="1"></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col mt-2">
                  <label for="Miedos" class="form-label">Principales miedos</label>
                  <textarea name="Miedos" class="form-control" id="Miedos" rows="1" aria-label="With textarea"></textarea>
                </div>
              </div>
              <div class="row mt-2 mb-3">
                <div class="col mt-2">
                  <label for="Magia" class="form-label">Habilidades Mágicas</label>
                  <textarea name="Magia" class="form-control" id="Magia" rows="1" aria-label="With textarea"></textarea>
                </div>
              </div>
            </div>
            <!----------------------------------------------->
            <div class="row mt-2 justify-content-md-center border fondoPolitica">
              <div class="row mt-2">
                <div class="col mt-2 ">
                  <label for="Religion" class="form-label">Religión</label>
                  <textarea name="Religion" class="form-control" id="Religion" rows="1" aria-label="With textarea"></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col mt-2 ">
                  <label for="Familia" class="form-label">Familia</label>
                  <textarea name="Familia" class="form-control" id="Familia" rows="1" aria-label="With textarea"></textarea>
                </div>
              </div>
              <div class="row mt-2 mb-3">
                <div class="col mt-2">
                  <label for="Politica" class="form-label">Política</label>
                  <textarea name="Politica" class="form-control" id="Politica" rows="1" aria-label="With textarea"></textarea>
                </div>
              </div>
            </div>
            <!----------------------------------------------->
            <div class="row mt-2 justify-content-md-center border fondoHistoria">
              <div class="row mt-2 mb-3">
                <div class="col ">
                  <label for="Historia" class="form-label">Historia</label>
                  <textarea name="Historia" class="form-control" id="Historia" rows="5" aria-label="With textarea"></textarea>
                </div>
              </div>
            </div>
            </form>
            </div>
    </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'layouts/footer.php';?>