<!DOCTYPE html>
<html lang="es">
<head>
	<title>Gestión de Recursos Informáticos</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="../RecursosInformaticos/assets/scss/style.scss">
	<link rel="icon" href="../RecursosInformaticos/images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<!-- Iconos de Google -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone" rel="stylesheet">
</head>
<body>
	<header>
		<?php 
			if(!isset($_SESSION)){ 
				session_start(); 
			} 
			if($_SESSION["realname"] ?? null) {
				require_once('header.php');
			} else echo "";
		?>		
	</header>

	<section>
		<?php 
			require_once('routing.php'); 
		?>
	</section>	
</body>
</html>