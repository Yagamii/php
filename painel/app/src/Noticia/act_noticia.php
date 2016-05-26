<?php
	$Noticia = new Noticia();
	$noticias = $Noticia->getTodasNoticias();
	$noticiaPorId = $Noticia->getNoticia(@$_GET['id']);
	
	if(isset($_POST['deletarnoticia'])){
		$Noticia->deletarNoticia($_GET['id']);
		header("Location: index.php?page=noticia");
	}
	
	if(isset($_POST['adicionar'])){
		$Noticia->addNoticia($_POST['titulo'], $_POST['corpo'], @$_POST['thumb'], $_POST['categoria']);
		ErrorHandler::setSucess("Noticia adicionada com sucesso");
	}
	
	if(isset($_POST['editar'])){
		$Noticia->editNoticia($_GET['id'], $_POST['titulo'], $_POST['corpo']);
		ErrorHandler::setSucess("Noticia alterada com sucesso.");
	}
?>