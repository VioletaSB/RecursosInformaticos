<?php 
/**
* Vista controlador Timeslots
*/
class TimeslotsController
{
	
	function __construct() {
		
	}
	
	//Función que redirige a la página de registro
	function register(){
		require_once('Views/Timeslots/registerTimeslots.php');
	}

	//Función que registra un nuevo tramo horario
	function save(){
		
		$time= new Time(null, $_REQUEST['dayOfWeek'],$_REQUEST['startTime'],$_REQUEST['endTime']);

		Time::save($time);
		$this->showTimeslots();
	}

	//Función que muestra el código
	function showTimeslots(){
		$listaTime=Time::all();

		require_once('Views/Timeslots/showTimeslots.php');
	}

	//Obtiene el id del tramo horario y después redirige a la página de actualizar el horario
	function updateTimeslots(){
		$id=$_REQUEST['id'];
		$time=Time::searchById($id);
		require_once('Views/Timeslots/updateTimeslots.php');
	}

	//Función que permite actualizar los valores del tramo horario
	function update(){
		$time = new Time($_REQUEST['id'], $_REQUEST['dayOfWeek'],$_REQUEST['startTime'],$_REQUEST['endTime']);

		Time::update($time);
		$this->showTimeslots();
	}

	//Función que borra un tramo horario
	function delete(){
		$id=$_REQUEST['id'];
		Time::delete($id);
		$this->showTimeslots();
	}
}

?>