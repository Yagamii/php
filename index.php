<?php
	$titulo_pagina = "Inicio";
	include ('header.php');
	
	require_once('../mysqli_phpconnect.php');
	
	echo '<h1 align="center">Ultimas notícias</h1>';
	
	$q = "SELECT * FROM noticias ORDER BY data_noticia DESC";
	$r = mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) > 0){
		echo '<br />';
		
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
				$resumoCorpo = substr($row['corpo'], 0, strrpos(substr($row['corpo'], 0, 480), ' ')) . '...';
				
				echo '<h2><a href="ver_noticia.php?nid='.$row['noticia_id'].'">'.$row['titulo'].'</a></h2>';
				echo '<p align="justify">'.$resumoCorpo.'</p>';
				echo '<div class="lermais" align="right"><table style="border: 1px double"><td><a href="ver_noticia.php?nid='.$row['noticia_id'].'">Ler mais.</a></td></table></div>';
		}	
	}else{
		echo '<p>Não foi encontrado nenhuma notícia. :( </p>';
	}
?>

	

<?php
	include('footer.php');
?>