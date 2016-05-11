<?php
	$usuario = new Usuario();
	$r = $usuario->getUsuarios();
	if(isset($_GET['id'])){
		$r = $usuario->getUsuario($_GET['id']);
	}
	
	if(isset($_POST['delusuario'])){
		$usuario->deletarUsuario($_GET['id']);
		header("Location: index.php?page=usuario");
	}
	
	if(isset($_POST['atualizar'])){
		$usuario->atualizarUsuario($_GET['id'], $_POST['nome'], $_POST['sobrenome'], $_POST['nivel']);
		header("Location:index.php?page=usuario");
	}
?>