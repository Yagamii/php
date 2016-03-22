<?php
	$titulo_pagina = "Deletar usuário";
	include('header.php');
	
	require_once ('../mysqli_phpconnect.php');
	
	$uid = $_GET['uid'];
	
	if(isset($_POST['delusuario'])){
		$q = "DELETE FROM usuarios WHERE usuario_id = '$uid'";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_affected_rows($dbc) === 1){
			echo '<p align="center" class="sucess"> O usuário foi excluido com sucesso!</p>';
		}else{
			echo '<p align="center" class="error">O usuário não pode ser deletado por um erro no sistema!</p>';
		}
	}
	//verifica se o usuario que esta tentando acessar a pagina tem poder para isso
	if($_SESSION['nivel_usuario'] > 0){
		if(isset($_GET['uid'])){
		
			$q = "SELECT usuario FROM usuarios WHERE usuario_id = '$uid'";
			$r = mysqli_query($dbc, $q);
		
			if(mysqli_num_rows($r) === 1){
				$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			
				echo '<h1 align="center">Deletar usuário</h1>';
				echo '<p align="center">Você tem certeza que deseja excluir o usuário: <b>'.$row['usuario'].'</b> ?';
				echo '<form action="del_usuario.php?uid='.$uid.'" name="deluser" method="post"><p align="center"><input type="hidden" name="delusuario" value="TRUE" />
						<input type="submit" name="delusu" value="Apagar" /></p></form>';
			}
		
		}
	}else{
		echo '<p align="center" class="error">Você não tem permissão para fazer isso.</p>';
	}
	
?>

<?php
	include('footer.php');
?>