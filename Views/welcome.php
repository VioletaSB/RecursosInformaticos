<?php
  if(!isset($_SESSION)) { 
      session_start(); 
  } 
  if($_SESSION["realname"] ?? null) {
    require_once('../RecursosInformaticos/Views/Layouts/header.php');
?>

<div class="card text-center">
  <h5 class="card-header">Recursos Informáticos</h5>
</div>

<div class="row align-items-start p-3">

  <div class="card ml-4 mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">view_in_ar</span>Lista de Recursos</h5>
      <p class="card-text text-justify">Aquí podrá consultar todos los recursos informáticos disponibles para reservar.</p>
      <a href="?controller=empleado&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        add_circle_outline</span>
		  </a>
      <a href="?controller=resources&action=showResources" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">event</span>Reservar recursos</a>
    </div>
  </div>

  <div class="card mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">date_range</span>Reservas</h5>
      <p class="card-text text-justify">Aquí podrá consultar todos los recursos reservados hasta el momento.</p>
      <a href="?controller=reservations&action=showReservations" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">date_range</span>Reservas activas</a>
    </div>
  </div>

  <div class="card mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">query_builder</span>TimeSlots</h5>
      <p class="card-text text-justify">Aquí podrá consultar todos los tramos horarios actualmente disponibles.</p>
      <a href="?controller=timeslots&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        alarm_add</span>
		  </a>
      <a href="?controller=timeslots&action=showTimeslots" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">query_builder</span>TimeSlots</a>
    </div>
  </div>

  <div class="card mr-4" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title" style="color:#195176;"><span class="material-icons align-middle">people_alt</span>Usuarios</h5>
      <p class="card-text text-justify">Aquí podrá consultar todos los usuario registrados y podrá gestionarlos.</p>
      <a href="?controller=users&action=register"
        class="btn btn-outline-primary btn-lg"
        role="button" aria-disabled="true"><span class='material-icons md-18'>
        person_add</span>
		  </a>
      <a href="?controller=users&action=showUsers" class="btn btn-outline-primary p-2">
      <span class="material-icons align-middle">people_alt</span>Usuarios</a>
    </div>
  </div>  
</div>

<?php
  } else require_once('Views/Errors/accessDenied.php');
?>