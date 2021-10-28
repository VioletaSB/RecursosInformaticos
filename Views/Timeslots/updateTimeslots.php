<?php 
  if(!isset($_SESSION)) { 
    session_start(); 
  } 
  if($_SESSION["realname"] ?? null) {
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?controller=index&action=index">Inicio</a></li>
    <li class="breadcrumb-item"><a href="?controller=timeslots&&action=showTimeslots">Tramo Horario</a></li>
  </ol>
</nav>

<div class="card container mt-2">
	<h2 class="align-self-center p-2">Actualizar 
	</h2>
	<!-- Muestra el formulario con los datos a actualizar -->
	<form action="?controller=timeslots&&action=update" method="POST">
		<table class="table">
			<tr>
				<input type="hidden" name="id" value="<?php echo $time->getId() ?>" >
				
				<td class="form-group">
					<label for="text">Día de la Semana</label>
					<input type="date" name="dayOfWeek" id="dayOfWeek" class="form-control" 
						value="<?php echo $time->getDayOfWeek() ?>">
				</td>

				<td class="form-group">
					<label for="text">Start Time</label>
					<input type="time" name="startTime" id="startTime" class="form-control" 
						value="<?php echo $time->getStartTime(); ?>">
				</td>

				<td class="form-group">
					<label for="text">End Time</label>
					<input type="time" name="endTime" id="endTime" class="form-control" 
						value="<?php echo $time->getEndTime(); ?>">
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