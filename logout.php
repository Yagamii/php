<?php
	
	$titulo_pagina = 'Deslogado';
	include ('header.html');
	
	if(!isset($_SESSION['usuario_id'])){
		
		header("Location: login.php");
		exit();
		
	}else{
		
		$_SESSION = array();
		session_destroy();
	}
		
?>

<?php
	echo "<h1>Agora você esta deslogado! </h1>";
?>

<?php
	include('footer.html');
?>