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
      <h1 class="text-center mt-3">Detalles del Alumno </h1>
      <hr class="mb-3">
    </div>

<?php
    include('config.php');
    $idAlumno      = ($_REQUEST['id']);
    //$idAlumno      = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $sqlAlumnos   = ("SELECT * FROM table_alumnos WHERE id='$idAlumno' LIMIT 1");
    $queryAlumnos = mysqli_query($con, $sqlAlumnos);
    $totalAlumnos = mysqli_num_rows($queryAlumnos);
?>
 
 <div class="col-md-8">
 <?php
    while ($dataAlumno = mysqli_fetch_array($queryAlumnos)) { ?>
    <div class="card" style="width: 30rem;">
        <img src="fotosAlumnos/<?php echo $dataAlumno['foto']; ?>" alt="foto perfil" class="card-img-top fotoPerfil">
        <div class="card-body">
            <p class="card-text titleAlumno"><?php echo $dataAlumno['namefull']; ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Cedula:</strong> <?php echo $dataAlumno['cedula']; ?> </li>
            <li class="list-group-item"><strong>Sexo:</strong> <?php echo $dataAlumno['sexo']; ?></li>
            <li class="list-group-item"><strong>Secci&oacute;n:</strong>  <?php echo $dataAlumno['section']; ?></li>
            <li class="list-group-item"><strong>Fecha Registro:</strong> <?php echo $dataAlumno['fechaRegistro']; ?></li>
        </ul>
        <div class="card-body">

        <div class="d-grid gap-2 col-12 mx-auto">
            <a href="./" class="btn btn-primary mt-3 mb-2">
                <i class="bi bi-arrow-left-circle"></i> 
                Volver
            </a>
        </div>
        </div>
    </div>
    <?php } ?>
 </div>



  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>