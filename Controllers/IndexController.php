<?php
/**
* Vista controlador Index
*/
class IndexController
{
    //Función que redirige a la página de bienvenida
	function index(){
		require_once('Views/welcome.php');
	}

	//Función que redirige a la página de login
	function login() {
		require_once('Views/Login/login.php');
	}

	//Función que redirige a la página de login
	function logout() {
		require_once('Views/Login/logout.php');
	}

	//Función que muestra una página de error
	function errorLogin(){
		require_once('Views/Errors/loginError.php');
	}

	//Función que muestra una página de error en la ruta
	function errorRuta(){
		require_once('Views/Errors/routeError.php');
	}
}

?>