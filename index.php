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
      <h1 class="text-center mt-3">CRUD con PHP - MYSQL y BOOTSTRAP 5 </h1>
      <p class="text-center">DESDE CERO, <span> AQUÍ SI APRENDERAS ..!</span> </p>
        <a href="./"><i class="bi bi-house"></i></a>
        <hr class="mb-3">
    </div>


    <div class="col-md-4 mb-3">
      <h3 class="text-center">Datos del Alumno</h3>
      <form method="POST" action="action.php" enctype="multipart/form-data">
        <input type="text" name="metodo" value="1" hidden>
      <div class="mb-3">
          <label class="form-label">Nombre y Apellido</label>
          <input type="text" class="form-control" name="namefull" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Cedula (nit)</label>
          <input type="number" name="cedula" class="form-control" required>
        </div>

        <div class="mb-3">
        <label for="Sexo">Sexo del Alumno</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" value="M" checked>
            <label class="form-check-label" for="sexoM">
              Masculino
            </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" value="F">
          <label class="form-check-label" for="sexoF">
            Fememino
          </label>
        </div>
        </div>
        <div class="mb-3">
          <label for="Sexo">Secci&oacute;n</label>
          <select class="form-select" name="section" id="section" required>
            <option value="">Asigne una sessi&oacute;n</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Foto del Alumno</label>
          <input class="form-control" type="file" name="foto" accept="image/png,image/jpeg" required>
        </div>

        <div class="d-grid gap-2 col-12 mx-auto">
          <button type="submit" class="btn  btn btn-primary mt-3 mb-2">
            Registrar nuevo Alumno
            <i class="bi bi-arrow-right-circle"></i>
          </button>
        </div>
        
      </form>
    </div>


    
    <?php
    include('config.php');
    $sqlAlumnos   = ("SELECT * FROM table_alumnos ORDER BY id DESC");
    $queryAlumnos = mysqli_query($con, $sqlAlumnos);
    $totalAlumnos = mysqli_num_rows($queryAlumnos);

    ?>
    <div class="col-md-8">
    <h3 class="text-center">Lista de Alumnos <?php echo '(' . $totalAlumnos . ')'; ?></h3>
      <div class="row">
        <div class="col-md-12 p-2">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th scope="col">Nombre y Apellido</th>
                  <th scope="col">Cedula (nit)</th>
                  <th scope="col">Sexo</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $conteo =1;
              while ($dataAlumno = mysqli_fetch_array($queryAlumnos)) { ?>
                <tr>
                  <td><?php echo  $conteo++ .')'; ?></td>
                  <td><?php echo $dataAlumno['namefull']; ?></td>
                  <td><?php echo $dataAlumno['cedula']; ?></td>
                  <td><?php echo $dataAlumno['sexo']==='M' ?  'Masculino' : 'Femenino' ?></td>
                  <td>
                  <a href="detalles.php?id=<?php echo $dataAlumno['id']; ?>" class="btn btn-warning mb-2"   title="Ver datos del alumno <?php echo $dataAlumno['namefull']; ?>">
                  <i class="bi bi-tv"></i> Ver</a>
                    <a href="formEditar.php?id=<?php echo $dataAlumno['id']; ?>" class="btn btn-info mb-2"   title="Actualizar datos del alumno <?php echo $dataAlumno['namefull']; ?>">
                    <i class="bi bi-arrow-clockwise"></i> Actualizar</a>
                    <a href="action.php?id=<?php echo $dataAlumno['id']; ?>&metodo=3&namePhoto=<?php echo $dataAlumno['foto']; ?>" class="btn btn-danger mb-2" title="Borrar el alumno <?php echo $dataAlumno['namefull']; ?>">
                    <i class="bi bi-trash"></i> Borrar</a>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
  include('mensajes.php'); 
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
$(function(){
  $('.toast').toast('show');
});
</script>

</body>
</html>