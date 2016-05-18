<?php
	$categorias = new Categorias();
	$r = $categorias->getCategorias();
	$c = $categorias->verCategoria(@$_GET['id']);
?>