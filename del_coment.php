<?php
	$titulo_pagina = "Deletar comentário";
	include('header.php');
	
	require_once('../mysqli_phpconnect.php');
	
	$cid = $_GET['cid'];
	
	if(isset($_POST['apagar'])){
		$q = "DELETE FROM comentarios WHERE comentario_id = '$cid'";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_affected_rows($dbc) === 1){
			echo '<p align="center" class="sucess"> O comentário foi apagado com sucesso</p>';
		}else{
			echo '<p align="center" class="error"> O comentário não pode ser apagado por uma falha no sistema</p>';
		}
	}
	
	if(isset($_GET['cid'])){
		
		$q = "SELECT * FROM comentarios INNER JOIN usuarios ON comentarios.usuario_id = usuarios.usuario_id WHERE comentarios.comentario_id = '$cid'";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_affected_rows($dbc) === 1){
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			echo '<h1 align="center">Deletar comentário</h1>';
			echo '<p align="center">Você tem certeza que deseja apagar o seguinte comentário de '.$row['usuario'].'?</p>';
			echo '<p align="center">"'.$row['mensagem'].'"</p>';
			
			echo '<form action="del_coment.php?cid='.$cid.'" name="apagarcoment" method="post"><p align="center"><input type="hidden" name="apagar" value="TRUE" />
									<input type="submit" name="apaga" value="Apagar" /></p></form>';
			
		}
		
	}
?>

<?php
	include('footer.php');
?>