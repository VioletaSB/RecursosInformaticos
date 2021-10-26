<?php
  if(!isset($_SESSION)) { 
      session_start(); 
  } 
  if($_SESSION["realname"] ?? null) {
?>
<div>	
	<!-- Botón de búsqueda -->
	<nav class="navbar navbar-light bg-light w-100">
		<a href="?controller=users&action=register"
			class="btn btn-outline-primary btn-lg"
			role="button" aria-disabled="true"><span class='material-icons md-18 p-1'>
			person_add</span>
		</a>
		<h4>Lista de Usuarios</h4>
		<form class="form-inline" action="?controller=users&action=search" method="post">
			<input class="form-control mr-sm-2" type="search" id="username" name="username" 
				placeholder="Busqueda por nombre" aria-label="Search">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
		</form>		
	</nav>
	<br/>
	<!-- Tabla que muestra los datos del Usuario -->
	<div class="table table-striped pl-2 pr-2">
		<table class="table table-hover table-sm">
			<thead>
				<tr>										
					<th>Id</th>
					<th>Nombre de Usuario</th>
					<th>Nombre Real</th>	
					<th>Tipo de Rol</th>			
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody style="cursor: pointer;">
			<!-- Muestra los datos de la tabla de usuario -->
					<?php foreach ($listaUsers as$users) {?>
					
					<tr onclick="document.location='?controller=users&&action=updateUsers&&id=<?php  
						echo $users->getIdUsers()?>'">
						<td><?php echo $users->getIdUsers(); ?></a> </td>
						<td><?php echo $users->getUsername(); ?></td>
						<td><?php echo $users->getRealname(); ?></td>
						<td><?php echo $users->getType(); ?></td>
						<td><span class='material-icons md-18'>
						<a href="?controller=users&&action=delete&&id=<?php 
						echo $users->getIdUsers() ?>" style="color:#195176;">delete</a></span></td>
					</tr>
					<?php } ?>
			</tbody>			
		</table>
	</div>	
</div>

<?php
  }else require_once('Views/Errores/accesoDenegado.php');
?>