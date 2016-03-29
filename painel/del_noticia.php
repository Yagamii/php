<?php
	$titulo_pagina = "Apagar noticia";
	include('../header.php');
	
	$nid = $_GET['nid'];
	require_once('../../mysqli_phpconnect.php');
	
	if(isset($_POST['enviado'])){
		$q = "DELETE FROM noticias WHERE noticia_id='$nid'";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_affected_rows($dbc) === 1){
			echo '<p class="sucess">A noticia foi apagada com sucesso!</p>';
		}else{
			echo '<p class="error">A noticia não pode ser apagada devido a um erro do sistema.</p>';
		}
	}
	
	if($_SESSION['nivel_usuario'] > 0){
		echo '<h1 align="center">Apagar notícia</h1>';
		
		if(isset($_GET['nid']) && is_numeric($_GET['nid'])){
			$q = "SELECT * FROM noticias WHERE noticia_id='$nid'";
			$r = mysqli_query($dbc, $q);
			
			if(mysqli_num_rows($r) === 1){
				$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
				
				echo '<p align="center">Você tem certeza que deseja apagar a noticia abaixo?</p>
						<p align="center"><b>'.$row['titulo'].'</b></p>';
				echo '<form action="del_noticia.php?nid='.$nid.'" name="apagar" method="post"><p align="center">
						<input type="hidden" name="enviado" value="TRUE" />
						<input type="submit" name="apagar" value="Apagar!" />
						</form></p>';
			}
		}
	}
	
?>
<?php
	include('../footer.php');
?>