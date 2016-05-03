<?php
	$noticias = new Noticias();
	$r = $noticias->getNews();
	
	if(isset($_SESSION['usuario_id']) && @$noticias->verAvaliacao($_SESSION['usuario_id'], $_GET['id'])){
		$a = @$noticias->verAvaliacao($_SESSION['usuario_id'], $_GET['id']);
		$a = mysqli_fetch_array($a, MYSQLI_ASSOC);
		$a = $a['avaliacao'];
	}
	
	switch(@$_GET['use']){
		case 'comentar':
			$noticias->addComent(@$_POST['mensagem']);
		break;
		
		case 'deletarcomentario':
			$noticias->delComent($_GET['cid']);
		break;
		
		case 'avaliar':
			$noticias->avaliar($_POST['ava'], $_SESSION['usuario_id'], $_GET['id']);
		break;
	}
	
	switch(action){
		case 'detalhes':
			$r = $noticias->getNoticia($_GET['id']);
			
		break;
		default:
		
	}
?>