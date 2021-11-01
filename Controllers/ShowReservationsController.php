<?php 
/**
* Vista controlador Reservations REVISAR
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


	//Función que permite buscar por el nombre
	function search()
	{
		if (!empty($_POST['name'])) 
		{
			$name=$_POST['name'];
			$reservations=ShowReservations::searchByName($name);
			$listaReservations[]=$reservations;
			
			require_once('Views/Reservations/showReservation.php');
		} 
		else 
		{
			$listaReservations=ShowReservations::all();
			
			require_once('Views/Reservations/showReservation.php');
		}		
	}
}

?>