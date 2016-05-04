<?php
	switch(action){
		case 'detalhes':
			require_once('app/template/Noticias/detalhes.php');
		break;
		default:
			require_once('app/template/Noticias/noticia.php');
		break;
	}
?>