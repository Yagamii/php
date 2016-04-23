<?php
	$cadastro = new Cadastro();
	
	if(action)
		$cadastro->cadastrar($_POST['nome'], $_POST['sobrenome'], $_POST['usuario'], $_POST['email'], $_POST['senha'], $_POST['csenha']);
?>