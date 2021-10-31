<?php 
/**
* Vista controlador Reservations REVISAR
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
		$reservations= new Reservations(null, $_POST['name'],$_POST['description'],$_POST['location'],
		$_POST['image']);

		Reservations::save($reservations);
		$this->showReservations();
	}

	//Función que muestra el código
	function showReservations()
	{
		$listaReservations=Reservations::all();

		require_once('Views/Reservations/showReservation.php');
	}

	//Función que borra un reservations
	function delete()
	{
		$id=$_GET['id'];
		Reservations::delete($id);
		$this->showReservations();
	}

	//Función que permite buscar por el nombre
	function search()
	{
		if (!empty($_POST['name'])) 
		{
			$name=$_POST['name'];
			$reservations=Reservations::searchByName($name);
			$listaReservations[]=$reservations;
			
			require_once('Views/Reservations/showReservation.php');
		} 
		else 
		{
			$listaReservations=Reservations::all();
			
			require_once('Views/Reservations/showReservation.php');
		}		
	}
}

?>