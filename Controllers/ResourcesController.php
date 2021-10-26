<?php 
/**
* Vista controlador Resources
*/
class ResourcesController
{
	
	function __construct() {
		
	}
	
	//Función que redirige a la página de registro
	function register(){
		require_once('Views/Resources/registerResources.php');
	}

	//Función que registra el nuevo resources
	function save(){
		$resources= new Resources(null, $_POST['name'],$_POST['description'],$_POST['location'],
		$_POST['image']);

		Resources::save($resources);
		$this->showResources();
	}

	//Función que muestra el código
	function showResources(){
		$listaResources=Resources::all();

		require_once('Views/Resources/showResources.php');
	}

	//Obtiene el id del resources y después redirige a la página de actualizar el resources
	function updateResources(){
		$id=$_GET['idResources'];
		$resources=Resources::searchById($id);
		require_once('Views/Resources/updateResources.php');
	}

	//Función que permite actualizar los valores del resources
	function update(){
		$resources = new Resources($_POST['id'],$_POST['name'],$_POST['description'],
			$_POST['location'],$_POST['image']);
		Resources::update($resources);
		$this->showResources();
	}

	//Función que borra un resources
	function delete(){
		$id=$_GET['id'];
		Resources::delete($id);
		$this->showResources();
	}

	//Función que permite buscar por el nombre
	function search(){
		if (!empty($_POST['name'])) {
			$name=$_POST['name'];
			$resources=Resources::searchByName($name);
			$listaResources[]=$resources;
			
			require_once('Views/Resources/showResources.php');
		} else {
			$listaResources=Resources::all();
			
			require_once('Views/Resources/showResources.php');
		}		
	}
}

?>