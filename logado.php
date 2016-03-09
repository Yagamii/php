<?php
	
	$titulo_pagina = 'Logado';
	include ('header.html');
		
?>

<?php
	echo "<h1>Agora você esta logado! </h1>
		<p>Seja bem vindo ".$_SESSION['usuario']." !</p>";
?>

<?php
	include('footer.html');
?>