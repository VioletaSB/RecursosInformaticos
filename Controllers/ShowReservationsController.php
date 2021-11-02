<?php 
/**
* Vista controlador Reservations
*/
class ShowReservationsController
{
	
	function __construct()
	{
		
	}
	
	//Función que redirige a la página de registro
	function register()
	{
		require_once('Views/Reservations/registerReservations.php');
	}

	//Función que muestra el código
	function showReservations()
	{
		$listaReservations=ShowReservations::all();

		require_once('Views/Reservations/showReservation.php');
	}
}
?>