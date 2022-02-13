
<?php
//Registro de Alumno con exito.
if(isset($_REQUEST['a'])){ ?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="imgs/logo.png" class="rounded me-2 logo" alt="Logo">
      <strong class="me-auto">Web Developer - Urian Viera</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <h6 class="text-center msjexito">Alumno registrado con exito.</h6>
    </div>
  </div>
</div>
<?php } ?>


<?php
//Msjs Datos del alumno actualizados
if(isset($_REQUEST['update'])){ ?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="imgs/logo.png" class="rounded me-2 logo" alt="Logo">
      <strong class="me-auto">Web Developer - Urian Viera</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <h6 class="text-center msjexito">Datos del Alumno actualizados con exito.</h6>
    </div>
  </div>
</div>
<?php } ?>

<?php
//Msjs Formato de imagen invalido o sobre pasa el peso establecido
if(isset($_REQUEST['errorimg'])){ ?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="imgs/logo.png" class="rounded me-2 logo" alt="Logo">
      <strong class="me-auto">Web Developer - Urian Viera</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <h6 class="text-center msjexito">Recuerde la Foto debe ser png o jpeg y no mayor a 1 Mega.</h6>
    </div>
  </div>
</div>
<?php } ?>


<?php
//Msjs Alumno borrado correctamente
if(isset($_REQUEST['deletAlumno'])){ ?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="imgs/logo.png" class="rounded me-2 logo" alt="Logo">
      <strong class="me-auto">Web Developer - Urian Viera</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        <h6 class="text-center msjexito">
          <?php echo $_REQUEST['mensaje']; ?>
        </h6>
    </div>
  </div>
</div>
<?php } ?>