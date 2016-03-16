<?php
	$titulo_pagina = "Equipe";
	include ('header.php');
	
	require_once ('../mysqli_phpconnect.php');
	
	echo '<h1 align="center">Equipe</h1>';
	
	$q = "SELECT * FROM usuarios WHERE nivel_usuario > 0";
	$r = mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) > 0){
		echo '<br />';
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
			echo '<div style="border-bottom: 1px solid; padding-bottom: 15px"><p>Nome: '.$row['nome'].' '.$row['sobrenome'].'</p>
				  <p>Apelido: '.$row['usuario'].'</p>
				  <p>Email: '.$row['email'].'</p>
				  <p>Cargo: ';
					
					if($row['nivel_usuario'] == 1){
						echo 'Moderador</p>';
					}elseif($row['nivel_usuario'] == 2){
						echo 'Administrador</p>';
					}
			
			echo '</div>';
		}
	}
	
?>


<?php
	include('footer.php');
?>