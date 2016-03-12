<?php
	$titulo_pagina = "Categorias";
	include ('header.php');
	
	include_once('../mysqli_phpconnect.php');
	
	$q = "SELECT * FROM categorias";
	$r = mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) > 0 ){
		
		echo '<h1 align="center">Categorias</h1>';
		
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
			echo '<p align="center" class="cats"><a href="#">- '.$row['nome'].'</a></p>';
		};
		
		
		
	}
	
?>
	

<?php
	include('footer.php');
?>