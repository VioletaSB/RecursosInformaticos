<?php 

//Llama a las funciones de ResourcesController.php para definir las rutas
$controllers=array(
	'index'=>['index','login','logout','error'],
	'resources'=>['register','save','showResources','updateResources','update','delete','search'],
	'timeslots'=>['register','save','showTimeslots','updateTimeslots','update','delete','search'],
	'users'=>['register','save','showUsers','updateUsers','update','delete','search'],
	'reservations'=>['register','save','showReservations','delete']
);

if (array_key_exists($controller, $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('index','routeError');
	}		
}else{
	call('index','loginError');
}

function call($controller, $action){
	require_once('Controllers/'.$controller.'Controller.php');

	switch ($controller) {
		//Con cada case se establece el nombre del controlador
		case 'index':
			$controller= new IndexController();
			break;	
		case 'resources':
			require_once('Model/Resources.php');
			$controller= new ResourcesController();
			break;
		case 'timeslots':
			require_once('Model/Timeslots.php');
			$controller= new TimeslotsController();
			break;				
		case 'users':
			require_once('Model/Users.php');
			$controller= new UsersController();
			break;
		case 'reservations':
			require_once('Model/Reservation.php');
			$controller= new ReservationsController();
			break;	
	}
	$controller->{$action}();
}

?>