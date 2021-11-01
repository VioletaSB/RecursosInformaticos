<?php 
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

<div class="card container mt-2">
	<h2 class="align-self-center p-2">Actualizar Recurso <?php echo $resources->getName() ?></h2>
	<!-- Muestra el formulario con los datos a actualizar -->
	<form action="?controller=resources&&action=update" method="POST">
		<table class="table">
			<tr>
				<input type="hidden" name="id" value="<?php echo $resources->getId() ?>" >
				
				<td class="form-group">
					<label for="text">Nombre</label>
					<input type="text" name="name" id="name" class="form-control" 
						value="<?php echo $resources->getName() ?>">
				</td>

				<td class="form-group">
					<label for="text">Descripción</label>
					<input type="text" name="description" id="description" class="form-control" 
						value="<?php echo $resources->getDescription(); ?>">
				</td>

				<td class="form-group">
					<label for="text">Localización</label>
					<input type="text" name="location" id="location" class="form-control" 
						value="<?php echo $resources->getLocation(); ?>">
				</td>
				<td class="form-group">
					<label for="text">Imagen:</label></br>
					
        			<input type='hidden' name='MAX_FILE_SIZE' value='3000000' />
        			<input name='image' type='file' /></br>
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