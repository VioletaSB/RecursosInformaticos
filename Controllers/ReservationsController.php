<?php 
/**
* Vista controlador Reservations
*/
class ReservationsController
{
	
	function __construct()
	{
		
	}
	
	//Función que redirige a la página de registro
	function register()
	{
		require_once('Views/Reservations/registerReservations.php');
	}

	//Función que registra el nuevo reservations
	function save()
	{
		$reservations = new Reservations($_REQUEST['idResource'],$_REQUEST['idUser'],$_REQUEST['idTimeSlot']);

		Reservations::save($reservations);
		require_once('Views/Errors/reservationSuccess.php');
	}

	//Función que muestra el código
	function showReservations()
	{
		$listaReservations = ShowReservations::all();

		require_once('Views/Reservations/showReservation.php');
	}
}
?>