<?php
  $db=Db::getConnect();

  if(!isset($_SESSION)) { 
    session_start(); 
  } 
  if($_SESSION["realname"] ?? null) {
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?controller=index&action=index">Inicio</a></li>
    <li class="breadcrumb-item"><a href="?controller=timeslots&action=showTimeslots">Tramos horarios</a></li>
  </ol>
</nav>

<div class="card container mt-3">
  <h2 class="align-self-center p-2">Registro de Tramo Horario</h2>
  
  <!-- Formulario de registro -->
  <form action="?controller=timeslots&&action=save" method="POST">
  <table class="table">
    <tr>
      <td class="form-group">
        <label for="text">Día de la Semana:</label>
        <input type="date" class="form-control" id="dayOfWeek" name="dayOfWeek">
      </td>
      <td class="form-group">
        <label for="text">Start Time:</label>
        <input type="time" class="form-control" id="startTime" name="startTime">
      </td>
      <td class="form-group">
        <label for="text">End Time:</label>
        <input type="time" class="form-control" id="endTime" name="endTime">
      </td>
    </tr>  
    <tr> 
      <td colspan="3">
        <button type="submit" class="btn btn-outline-primary">Guardar</button>
      </td>
    </tr>    
  </table>
  </form>  
</div>

<?php
  } else require_once('Views/Errors/accessDenied.php');
?>