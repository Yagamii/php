<?php
	$noticia = new Noticia;
	$r = $noticia->getNoticia(id);
	
	if(isset($_SESSION['usuario_id']) && $noticia->verAvaliacao($_SESSION['usuario_id'], id)){
		$a = $noticia->verAvaliacao($_SESSION['usuario_id'], id);
		$a = mysqli_fetch_array($a, MYSQLI_ASSOC);
		$a = $a['avaliacao'];
	}

	
	switch(action){
		case 'comentar':
			$noticia->addComent(@$_POST['mensagem']);
		break;
		
		case 'deletarcomentario':
			$noticia->delComent(cid);
		break;
		
		case 'avaliar':
			$noticia->avaliar($_POST['ava'], $_SESSION['usuario_id'], id);
		break;
	}
?>