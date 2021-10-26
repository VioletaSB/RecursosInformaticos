<?php
  if(!isset($_SESSION)) { 
      session_start(); 
  } 
  if($_SESSION["realname"] ?? null) {
?>
<div>	
	<!-- Botón de búsqueda -->
	<nav class="navbar navbar-light bg-light w-100">
		<a href="?controller=timeslots&action=register"
			class="btn btn-outline-primary btn-lg"
			role="button" aria-disabled="true"><span class='material-icons md-18 p-1'>
			alarm_add</span>
		</a>
		<h4>Lista de Tiendas</h4>	
	</nav>
	<br/>
	<!-- Tabla que muestra los datos de la timeslots -->
	<div class="table table-striped pl-2 pr-2">
		<table class="table table-hover table-sm">
			<thead>
				<tr>										
					<th>Id</th>
					<th>Día de la Semana</th>
					<th>Start Time</th>
					<th>End Time</th>					
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody style="cursor: pointer;">
			<!-- Muestra los datos de la tabla tienda -->
					<?php foreach ($listaTime as$time) {?>
					
					<tr onclick="document.location='?controller=timeslots&&action=updateTimeslots&&id=<?php  
						echo $time->getId()?>'">
						<td><?php echo $time->getId(); ?></a> </td>
						<td><?php echo $time->getDayOfWeek(); ?></td>
						<td><?php echo $time->getStartTime(); ?></td>
						<td><?php echo $time->getEndTime(); ?></td>						
						<td><span class='material-icons md-18'>
						<a href="?controller=timeslots&&action=delete&&id=<?php 
						echo $time->getId() ?>" style="color:#195176;">delete</a></span></td>
					</tr>
					<?php } ?>
			</tbody>			
		</table>
	</div>	
</div>

<?php
  }else require_once('Views/Errores/accesoDenegado.php');
?>