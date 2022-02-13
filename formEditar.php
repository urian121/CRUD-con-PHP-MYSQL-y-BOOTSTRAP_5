<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP - MYSQL y BOOTSTRAP 5 :: WebDeveloper Urian Viera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <!-- https://icons.getbootstrap.com/ -->
  </head>
<body>
    
<div class="container mt-3">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <h1 class="text-center mt-3">
        <a href="./">
          <i class="bi bi-arrow-left-circle"></i>
        </a>
        Actualizar Datos del Alumno 
      </h1>
      <hr class="mb-3">
    </div>


    
    <?php
    include('config.php');
    $idAlumno     = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $sqlAlumnos   = ("SELECT * FROM table_alumnos WHERE id='$idAlumno' LIMIT 1");
    $queryAlumnos = mysqli_query($con, $sqlAlumnos);
    $dataAlumno   = mysqli_fetch_array($queryAlumnos);
    ?>

    <div class="col-md-5 mb-3">
      <h3 class="text-center">Datos del Alumno</h3>
      <form method="POST" action="action.php?metodo=2" enctype="multipart/form-data">
      <input type="text" name="id" value="<?php echo $dataAlumno['id']; ?>" hidden>
      <div class="mb-3">
          <label class="form-label">Nombre y Apellido</label>
          <input type="text" class="form-control" name="namefull" value="<?php echo $dataAlumno['namefull']; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Cedula (nit)</label>
          <input type="number" name="cedula" class="form-control" value="<?php echo $dataAlumno['cedula']; ?>">
        </div>

        <div class="mb-3">
        <label for="Sexo">Sexo del Alumno</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" value="M" <?php echo $dataAlumno['sexo']==='M' ?  'checked' : '' ?> checked>
            <label class="form-check-label" for="sexoM">
              Masculino
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" value="F" <?php echo $dataAlumno['sexo']==='F' ?  'checked' : '' ?>>
          <label class="form-check-label" for="sexoF">
            Fememino
          </label>
        </div>
        </div>
        <div class="mb-3">
          <label for="Sexo">Secci&oacute;n</label>
          <select class="form-select" name="section">
          <?php  
            if($dataAlumno['section'] =="A"){
              echo '<option value="A" selected>A</option>';
              echo '<option value="B">B</option>';
              echo '<option value="C">C</option>';
            }elseif($dataAlumno['section'] =="B"){
              echo '<option value="B" selected>B</option>';
              echo '<option value="A">A</option>';
              echo '<option value="C">C</option>';
            }else{
              echo '<option value="C" selected>C</option>';
              echo '<option value="A">A</option>';
              echo '<option value="B">B</option>';
            }
          ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="formFile" class="form-label">Foto del Alumno</label>
          <input class="form-control" type="file" name="foto" accept="image/png,image/jpeg">
        </div>

        <div class="d-grid gap-2 col-12 mx-auto">
          <button type="submit" class="btn  btn btn-primary mt-3 mb-2">
            Actualizar datos del Alumno
            <i class="bi bi-arrow-right-circle"></i>
          </button>
        </div>
        
      </form>
    </div>

    <div class="col-md-5 mb-3">
        <label class="form-label">Foto actual del alumno</label>
        <br>
        <img src="fotosAlumnos/<?php echo $dataAlumno['foto']; ?>" alt="foto perfil" class="card-img-top fotoPerfil">
    </div>



  </div>
</div>

<?php
  include('mensajes.php'); 
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
$(function(){
  $('.toast').toast('show');
});
</script>

</body>
</html>