<?php 
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

<div class="card container mt-2">
	<h2 class="align-self-center p-2">Actualizar Usuario <?php echo $users->getUsername() ?> 
	</h2>
	<!-- Muestra el formulario con los datos a actualizar -->
	<form action="?controller=users&&action=update" method="POST">
		<table class="table">
			<tr>
				<input type="hidden" name="id" value="<?php echo $users->getIdUsers() ?>" >
				
				<td class="form-group">
					<label for="text">Nombre Usuario</label>
					<input type="text" name="username" id="username" class="form-control" 
						value="<?php echo $users->getUsername() ?>">
				</td>

				<td class="form-group">
					<label for="text">Nombre Real</label>
					<input type="text" name="realname" id="realname" class="form-control" 
						value="<?php echo $users->getRealname(); ?>">
				</td>

				<td class="form-group">
					<label for="text">Tipo</label>
					<input type="number" name="type" id="type" class="form-control" 
						value="<?php echo $users->getType(); ?>">
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<button type="submit" class="btn btn-outline-primary">Actualizar</button>
				</td>
			</tr>
		</table>
	</form>
</div>

<?php
  } else require_once('Views/Errors/accessDenied.php');
?>