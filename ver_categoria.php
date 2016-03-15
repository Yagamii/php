<?php
	include ('header.php');
	
	if(isset($_GET['cid'])){
		$cid = $_GET['cid'];
		
		require_once('../mysqli_phpconnect.php');
		
		$q = "SELECT nome FROM categorias WHERE categoria_id='$cid'";
		$r = mysqli_query($dbc, $q);
		
		$cnome = mysqli_fetch_array($r, MYSQLI_ASSOC);
		
		echo '<h1 align="center">'.$cnome['nome'].'</h1>';
		
		$q = "SELECT * FROM noticias INNER JOIN categoria ON noticias.categoria_id = categorias.categoria_id WHERE categorias.categoria_id='$cid' ORDER BY noticias.data_noticia DESC";
		$r = mysqli_query($dbc, $q);
		
		
		
		if(@mysqli_num_rows > 0){
			while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
				
				$resumoCorpo = substr($row['corpo'], 0, strrpos(substr($row['corpo'], 0, 60), ' ')) . '...';
				
				echo '<h2>'.$row['titulo'].'</h2>';
				echo '<p>'.$resumoCorpo.'</p>';
				echo '<p align="right"><a href="ver_noticia.php?nid='.$$row['noticia_id'].'">Ler mais.</a></p>';
			}
		}else{
			echo '<p align="center">Não tem nenhuma noticia nesta categoria. :(</p>';
		}
		
	}else{
		header("Location: categorias.php");
	}
	
?>



<?php
	include ('footer.php');
?>