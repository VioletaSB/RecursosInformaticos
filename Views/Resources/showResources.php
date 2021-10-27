<?php
  if(!isset($_SESSION)) { 
      session_start(); 
  } 
  if($_SESSION["realname"] ?? null) {
?>
<div>	
	<!-- Botón de búsqueda -->
	<nav class="navbar navbar-light bg-light w-100">
		<a href="?controller=resources&action=register"
			class="btn btn-outline-primary btn-lg"
			role="button" aria-disabled="true"><span class='material-icons md-18 p-1'>
			add_circle_outline</span>
		</a>
		<h4>Lista de Recursos</h4>
		<form class="form-inline" action="?controller=resources&action=search" method="post">
			<input class="form-control mr-sm-2" type="search" id="name" name="name" 
				placeholder="Busqueda por nombre" aria-label="Search">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
		</form>		
	</nav>
	<br/>
	<!-- Tabla que muestra los datos de resources -->
	<div class="table table-striped pl-2 pr-2">
		<table class="table table-hover table-sm">
			<thead>
				<tr>										
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Localización</th>
					<th>Imagen</th>				
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody style="cursor: pointer;">
			<!-- Muestra los datos de la tabla de resources -->
					<?php foreach ($listaResources as$resources) {?>
					
					<tr onclick="document.location='?controller=resources&&action=updateResources&&idResources=<?php  
						echo $resources->getId()?>'">
						<td><?php echo $resources->getId(); ?></a> </td>
						<td><?php echo $resources->getName(); ?></td>
						<td><?php echo $resources->getDescription(); ?></td>
						<td><?php echo $resources->getLocation(); ?></td>
						<td><?php echo $resources->getImage(); ?></td>
						<td><span class='material-icons md-18'>
						<a href="?controller=resources&&action=delete&&id=<?php 
						echo $resources->getId() ?>" style="color:#195176;">delete</a></span></td>
					</tr>
					<?php } ?>
			</tbody>			
		</table>
	</div>	
</div>

<?php
  }else require_once('Views/Errors/accessDenied.php');
?>