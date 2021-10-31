<!-- Cabecera de la página -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="nav-link-primary" href="?controller=index&action=index" style="color:#195176;">          
    <img src="../RecursosInformaticos/images/reloj.jpg"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2 ml-2" href="?controller=resources&&action=showResources" style="color:#195176;">
            <span class="material-icons md-18 align-middle">view_in_ar</span>Mantenimiento Recursos</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2 ml-2" href="?controller=reservations&&action=showReservations" style="color:#195176;">
            <span class="material-icons md-18 align-middle">event</span>Reservas</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="?controller=timeslots&&action=showTimeslots" style="color:#195176;">
            <span class="material-icons md-18 align-middle">query_builder</span>Mantenimiento Tramos Horarios</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link-primary p-2" href="?controller=users&&action=showUsers" style="color:#195176;">
            <span class="material-icons md-18 align-middle">people_alt</span>Mantenimiento Usuarios</a>
        </li>
      </ul>      
    </div>
  </div>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav float-right">
      <li class="nav-item">
        <a class="nav-link-primary p-1" href="?controller=index&&action=logout" style="color:#195176;">
        <span class="material-icons md-18 align-middle">logout</span>Salir</a>
      </li>
    </ul>
  </div>
</nav>

