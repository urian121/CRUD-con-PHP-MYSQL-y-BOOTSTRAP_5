<?php
include('config.php');
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');

$metodoAction  = (int) filter_var($_REQUEST['metodo'], FILTER_SANITIZE_NUMBER_INT);

//$metodoAction ==1, es crear un registro nuevo
if($metodoAction == 1){

    $fechaRegistro  = date('d-m-Y H:i:s A', time()); 
    $namefull       = filter_var($_POST['namefull'], FILTER_SANITIZE_STRING);
    $cedula         = (int) filter_var($_POST['cedula'], FILTER_SANITIZE_NUMBER_INT);
    $sexo           = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
    $section        = filter_var($_POST['section'], FILTER_SANITIZE_STRING);

    //Informacion de la foto
    $filename       = $_FILES["foto"]["name"]; //nombre de la foto
    $tipo_foto      = $_FILES['foto']['type']; //tipo de archivo
    $sourceFoto     = $_FILES["foto"]["tmp_name"]; //url temporal de la foto
    $tamano_foto    = $_FILES['foto']['size']; //tamaño del archivo (foto)

//Se comprueba si la foto a cargar es correcto observando su extensión y tamaño, 100000 = 1 Mega 
if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
    //código para renombrar la foto 
    $logitudPass 	        = 8;
    $newNameFoto            = substr( md5(microtime()), 1, $logitudPass);
    $explode                = explode('.', $filename);
    $extension_foto         = array_pop($explode);
    $nuevoNameFoto          = $newNameFoto.'.'.$extension_foto;

    //Verificando si existe el directorio, de lo contrario lo creo
    $dirLocal       = "fotosAlumnos";
    if (!file_exists($dirLocal)) {
        mkdir($dirLocal, 0777, true);
    }

    $miDir 		      = opendir($dirLocal); //Habro mi  directorio
    $urlFotoAlumno    = $dirLocal.'/'.$nuevoNameFoto; //Ruta donde se almacena la factura.

    //Muevo la foto a mi directorio.
    if(move_uploaded_file($sourceFoto, $urlFotoAlumno)){
        $SqlInsertAlumno = ("INSERT INTO table_alumnos(
            namefull,
            cedula,
            sexo,
            section,
            foto,
            fechaRegistro
        )
        VALUES(
            '".$namefull."',
            '".$cedula."',
            '".$sexo."',
            '".$section."',
            '".$nuevoNameFoto."',
            '".$fechaRegistro."'
        )");
        $resulInsert = mysqli_query($con, $SqlInsertAlumno);
        ///print_r( $SqlInsertAlumno);

    }
    closedir($miDir);
    header("Location:index.php?a=1");

  }else{
    header("Location:index.php?errorimg=1");
  }
}


//Actualizar registro del Alumno
if($metodoAction == 2){
    $idAlumno      = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

    $namefull       = filter_var($_POST['namefull'], FILTER_SANITIZE_STRING);
    $cedula         = (int) filter_var($_POST['cedula'], FILTER_SANITIZE_NUMBER_INT);
    $sexo           = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
    $section        = filter_var($_POST['section'], FILTER_SANITIZE_STRING);

    $UpdateAlumno    = ("UPDATE table_alumnos
        SET namefull='$namefull',
        cedula='$cedula', 
        sexo='$sexo', 
        section='$section'
        WHERE id='$idAlumno' ");
    $resultadoUpdate = mysqli_query($con, $UpdateAlumno);


    //Verificando si existe foto del alumno para actualizar
    if (!empty($_FILES["foto"]["name"])){
            $filename       = $_FILES["foto"]["name"]; //nombre de la foto
            $tipo_foto      = $_FILES['foto']['type']; //tipo de archivo
            $sourceFoto     = $_FILES["foto"]["tmp_name"]; //url temporal de la foto
            $tamano_foto    = $_FILES['foto']['size']; //tamaño del archivo (foto)

            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo_foto, "PNG") || strpos($tipo_foto, "jpg") && ($tamano_foto < 100000)))) {
            $logitudPass 	        = 8;
            $newNameFoto            = substr( md5(microtime()), 1, $logitudPass);
            $explode                = explode('.', $filename);
            $extension_foto         = array_pop($explode);
            $nuevoNameFoto          = $newNameFoto.'.'.$extension_foto;

            //Verificando si existe el directorio, de lo contrario lo creo
            $dirLocal       = "fotosAlumnos";
            $miDir 		      = opendir($dirLocal); //Habro mi  directorio
            $urlFotoAlumno    = $dirLocal.'/'.$nuevoNameFoto; //Ruta donde se almacena la factura.

            //Muevo la foto a mi directorio.
        if(move_uploaded_file($sourceFoto, $urlFotoAlumno)){
            $updateFoto = ("UPDATE table_alumnos SET foto='$nuevoNameFoto' WHERE id='$idAlumno' ");
            $resultFoto = mysqli_query($con, $updateFoto);
        }
    }else{
        header("Location:index.php?errorimg=1");
    }
  }

  header("Location:formEditar.php?update=1&id=$idAlumno");
 }



//Eliminar Alumno
if($metodoAction == 3){
    $idAlumno  = (int) filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
    $namePhoto = filter_var($_REQUEST['namePhoto'], FILTER_SANITIZE_STRING);

    $SqlDeleteAlumno = ("DELETE FROM table_alumnos WHERE  id='$idAlumno'");
    $resultDeleteAlumno = mysqli_query($con, $SqlDeleteAlumno);
    
    if($resultDeleteAlumno !=0){
        $fotoAlumno = "fotosAlumnos/".$namePhoto;
        unlink($fotoAlumno);
    }
    
    $msj ="Alumno Borrado correctamente.";
    header("Location:index.php?deletAlumno=1&mensaje=".$msj);
 
}

?>