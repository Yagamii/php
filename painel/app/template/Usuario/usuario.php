<?php
	switch(action){
		case 'editar':
			require_once('app/template/Usuario/editar.php');
		break;
		case 'deletar':
			require_once('app/template/Usuario/deletar.php');
		break;
		default:
			require_once('app/template/Usuario/usuarios.php');
		break;
	}
?>