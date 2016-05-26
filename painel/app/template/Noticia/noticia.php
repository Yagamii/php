<?php
	switch(action){
		case 'adicionar':
			require_once('app/template/Noticia/adicionar.php');
		break;
		case 'deletar':
			require_once('app/template/Noticia/deletar.php');
		break;
		case 'editar':
			require_once('app/template/Noticia/editar.php');
		break;
		default:
			require_once('app/template/Noticia/noticias.php');
		break;
	}
?>