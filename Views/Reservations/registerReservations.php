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
    <li class="breadcrumb-item"><a href="?controller=showreservations&&action=showReservations">Reservas</a></li>
  </ol>
</nav>

<div class="card container mt-3">
  <h2 class="align-self-center p-2">Reservar 
  </h2>
  
  <!-- Formulario de registro -->
  <form action="?controller=reservations&&action=save" method="POST">
  <table class="table">
  <tr>
      <td class="form-group">
        <label for="idResource">Recursos disponibles:</label>
        <select class="form-control" name="idResource">
        <option value="">Seleccione el recurso que desea reservar:</option>
        <?php
          $query = $db->prepare("SELECT * FROM resources");
          $query->execute();
          $recurso = $query->fetchAll();

          foreach ($recurso as $valores):
            echo '<option value="'.$valores["id"].'">'.$valores["name"].' </option>';
          endforeach;
        ?>
        </select>
      </td>

      <td class="form-group">
        <label for="idUser">¿Qué usuario reservará el equipo?:</label>
        <select class="form-control" name="idUser">
        <option value="">Seleccione el usuario:</option>
        <?php
          $query = $db->prepare("SELECT * FROM users");
          $query->execute();
          $usuario = $query->fetchAll();

          foreach ($usuario as $valores):
            echo '<option value="'.$valores["id"].'">'.$valores["realname"].' </option>';
          endforeach;
        ?>
        </select>
        </td>
    
      <td class="form-group">
        <label for="idTimeSlot">Tramos Horarios Disponibles:</label>
        <select class="form-control" name="idTimeSlot">
        <option value="">Seleccione un tramo horario:</option>
        <?php
          $query = $db->prepare("SELECT * FROM timeslots");
          $query->execute();
          $dia = $query->fetchAll();

          foreach ($dia as $valores):
            echo '<option value="'.$valores["id"].'">'.$valores["dayOfWeek"].' || '.$valores["startTime"].' || '.$valores["endTime"].'</option>';
          endforeach;
        ?>
        </select>
        </td>
    </tr>
    <tr> 
      <td colspan="3">
        <button type="submit" class="btn btn-outline-primary">Reservar</button>
      </td>
    </tr>    
  </table>
  </form>  
</div>

<?php
  } else require_once('Views/Errors/accessDenied.php');
?>