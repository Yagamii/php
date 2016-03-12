<?php
	$titulo_pagina = "Administração";
	include ('header.php');
?>

<h1>Painel do admin</h1>
	<br />
	<ul type="disc">
    	<li>Usuários</li>
    	<ul><li><a href="ver_usuarios.php">Editar usuario</a></li></ul>
        <li>Categoria</li>
        <ul><li><a href="add_categoria.php">Adicionar categoria</a></li></ul>
        <ul><li><a href="del_categoria.php">Deletar categoria</a></li></ul>
        <li>Conteúdo</li>
        <ul><li><a href="add_materia.php">Escrever matéria</a></li></ul>
        <li><b><a href="logout.php">Logout</a></b></li>
    </ul>

<?php
	include('footer.php');
?>