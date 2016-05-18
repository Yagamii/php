<?php

	switch(action){
		case 'adicionar':
			require_once('app/template/Categoria/adicionar.php');
		break;
		case 'editar':
			require_once('app/template/Categoria/editar.php');
		break;
		case 'deletar':
			require_once('app/template/Categoria/deletar.php');
		break;
		default:
			require_once('app/template/Categoria/categorias.php');
		break;
	}

?>