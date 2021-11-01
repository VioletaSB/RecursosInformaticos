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
    <li class="breadcrumb-item"><a href="?controller=resources&&action=showResources">Recursos</a></li>
  </ol>
</nav>

<div class="card container mt-3">
  <h2 class="align-self-center p-2">Registro de Recurso Informático</h2>
  
  <!-- Formulario de registro -->
  <form enctype="multipart/form-data" action="?controller=resources&&action=save" method="POST">
  <table class="table">
  <tr>
      <td class="form-group">
        <label for="text">Nombre:</label>
        <input type="text" class="form-control" id="name" placeholder="Ingrese el nombre" 
          name="name">
      </td>
      <td class="form-group" colspan="2">
        <label for="text">Descripción:</label>
        <input type="text" name="description" class="form-control" placeholder="Ingrese la descripción">
      </td>
    </tr>    
    <tr>
      <td class="form-group">
        <label for="text">Localización:</label>
        <input type="text" name="location" class="form-control" placeholder="Ingrese la localización">
      </td>
      <td class="form-group">
        <label for="text">Imagen:</label></br>
        <input type='hidden' name='MAX_FILE_SIZE' value='3000000' />
        <input name='image' type='file' /></br>
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