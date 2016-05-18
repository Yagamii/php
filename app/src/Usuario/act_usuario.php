<?php
	$usuario = new Usuario();
	$usuario->setId($_GET['id']);
	
	$r = $usuario->getUser();
	
	if(action){
		switch(action){
			case 'editar':
				$usuario->editUser($_POST['nome'], $_POST['sobrenome']);
				$r = $usuario->getUser();
			break;
		}
	}
?>