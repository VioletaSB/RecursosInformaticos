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
    <li class="breadcrumb-item"><a href="?controller=users&&action=showUsers">Usuarios</a></li>
  </ol>
</nav>

<div class="card container mt-3">
  <h2 class="align-self-center p-2">Registro de Usuarios</h2>
  
  <!-- Formulario de registro -->
  <form action="?controller=users&&action=save" method="POST">
  <table class="table">
    <tr>
      <td class="form-group">
        <label for="text">Username:</label>
        <input type="text" class="form-control" id="username" placeholder="Ingrese el nombre de usuario" 
          name="username">
      </td>
      <td class="form-group" colspan="2">
        <label for="text">Nombre Real:</label>
        <input type="text" name="realname" class="form-control" placeholder="Ingrese el nombre real"
        name="realname">
      </td>
    </tr>    
    <tr>
      <td class="form-group">
        <label for="text">Contraseña:</label>
        <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña">
      </td>
      <td class="form-group">
        <label for="text">Tipo de rol:</label>
        <input type="text" name="type" class="form-control" placeholder="Ingrese el tipo de rol">
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