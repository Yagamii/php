<?php

	$categoria = new Categoria();
	$categorias = $categoria->getCategorias();
	$cat = $categoria->getCategoria(@$_GET['id']);
	
	if(isset($_POST['adicionar'])){
		$categoria->adicionarCategoria($_POST['categoria']);
	}
	
	if(isset($_POST['editar'])){
		$categoria->editarCategoria($_GET['id'], $_POST['categoria']);
	}
	
	if(isset($_POST['deletar'])){
		$categoria->deletarCategoria($_GET['id']);
	}
?>