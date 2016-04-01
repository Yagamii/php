<?php
	$titulo_pagina = "Inicio";
	include ('header.php');
	
	if(isset($_SESSION['usuario_id'])){
	require_once('../mysqli_phpconnect.php');
	
	echo '<h1 align="center">Ultimas notícias</h1>';
	
	$q = "SELECT * FROM noticias ORDER BY data_noticia DESC";
	$r = mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) > 0){
		echo '<br />';
		
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
				$noid = $row['noticia_id'];
				$g = "SELECT COUNT(comentario_id) FROM comentarios WHERE noticia_id='$noid'";
				$c = mysqli_query($dbc, $g);
				
				$coment_num = mysqli_fetch_array($c, MYSQLI_NUM);
				
				$resumoCorpo = substr($row['corpo'], 0, strrpos(substr($row['corpo'], 0, 480), ' ')) . '...';
				
				echo '<h2><a href="ver_noticia.php?nid='.$row['noticia_id'].'">'.$row['titulo'].'</a></h2>';
				echo '<br/><div align="center"><a href="ver_noticia.php?nid='.$row['noticia_id'].'"><img src="/php/includes/uploads/thumbnail/'.$row['thumbnail'].'" height="360" width="710" alt="'.$row['titulo'].'" /></a></div>';
				echo '<p align="justify" style="margin-top: -10px">'.$resumoCorpo.'</p>';
				echo '  <div class="lermais" ><span style="color: grey; font-style: italic">'.$coment_num[0].' comentário(s)</span><a href="ver_noticia.php?nid='.$row['noticia_id'].'"><div style="border: 1px double; float: right; padding: 2px; margin-right: 4px">Ler mais.</div></a></div>';
		}	
	}else{
		echo '<p>Não foi encontrado nenhuma notícia. :( </p>';
	}
	}else{
		header("Location: login.php");
	}
?>

	

<?php
	include('footer.php');
?>