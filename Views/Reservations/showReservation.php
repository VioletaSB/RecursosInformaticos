<?php
  if(!isset($_SESSION)) { 
      session_start(); 
  } 
  if($_SESSION["realname"] ?? null) {
?>
<div>	
	<!-- Botón de búsqueda -->
	<nav class="navbar navbar-light bg-light w-100">
		<h4>Lista de Reservas</h4>	
	</nav>
	<br/>
	<!-- Tabla que muestra los datos de resources -->
	<div class="table table-striped pl-2 pr-2">
		<table class="table table-hover table-sm">
			<thead>
				<tr>										
					<th>Nombre</th>
					<th>Imagen</th>
					<th>Usuario</th>
					<th>Día de la Semana</th>	
					<th>Hora de Inicio</th>	
					<th>Hora de Fin</th>			
					<th>Eliminar</th>					
				</tr>
			</thead>
			<tbody>
			<!-- Muestra los datos de la tabla de resources -->
					<?php foreach ($listaReservations as $reservations) {?>
					
					<tr>
						<td><?php echo $reservations->getName(); ?></a> </td>
						<td><?php echo $reservations->getImage(); ?></td>
						<td><?php echo $reservations->getRealname(); ?></td>
						<td><?php echo $reservations->getDayOfWeek(); ?></td>
						<td><?php echo $reservations->getStartTime(); ?></td>
						<td><?php echo $reservations->getEndTime(); ?></td>
						<!-- REVISAR -->
						<td><span class='material-icons md-18'>
						<a href="?controller=reservations&&action=delete ?>" style="color:#195176;">delete</a></span></td>
						
					</tr>
					<?php } ?>
			</tbody>			
		</table>
	</div>	
</div>

<?php
  }else require_once('Views/Errors/accessDenied.php');
?>