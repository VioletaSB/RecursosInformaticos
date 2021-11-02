<?php 
/**
* Vista controlador Users
*/
class UsersController
{
	
	function __construct() {
		
	}
	
	//Función que redirige a la página de registro
	function register(){
		require_once('Views/Users/registerUsers.php');
	}

	//Función que registra un nuevo usuario
	function save(){
		
		$users= new Users(null, $_REQUEST['username'],$_REQUEST['password'],$_REQUEST['realname'],$_REQUEST['type']);

		Users::save($users);
		$this->showUsers();
	}

	//Función que muestra los usuarios registrados
	function showUsers(){
		$listaUsers=Users::all();

		require_once('Views/Users/showUsers.php');
	}

	//Obtiene el id del usuario y después redirige a la página de actualizar el usuario
	function updateUsers(){
		$id=$_REQUEST['id'];
		$users=Users::searchById($id);
		require_once('Views/Users/updateUsers.php');
	}

	//Función que permite actualizar los valores del usuario
	function update(){
		$users = new Users($_REQUEST['id'],$_REQUEST['username'],$_REQUEST['password'],
		$_REQUEST['realname'],$_REQUEST['type']);
		Users::update($users);
		$this->showUsers();
	}

	//Función que borra un usuario
	function delete(){
		$id=$_REQUEST['id'];
		Users::delete($id);
		$this->showUsers();
	}

	//Función que permite buscar por el nombre de la usuario
	function search(){
		if (!empty($_REQUEST['username'])) {
			$username=$_REQUEST['username'];
			$users=Users::searchByName($username);
			$listaUsers[]=$users;
			
			require_once('Views/Users/showUsers.php');
		} else {
			$listaUsers=Users::all();
			
			require_once('Views/Users/showUsers.php');
		}		
	}
}

?>