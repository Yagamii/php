<?php
	$titulo_pagina = "Ver categorias";
	include('header.php');
	
	require_once('../mysqli_phpconnect.php');
	
	if($_SESSION['nivel_usuario'] > 0){
	echo '<h1 align="center">Lista de categorias</h1>';
	//Seleciona todas categorias da tabela
	$q = "SELECT * FROM categorias";
	$r = mysqli_query($dbc, $q);
	//Exibe o cabeçalho do formulario
	echo '<br /><div align="center"><table cellspacing="1" cellpadding="2" width="45%">';
	echo '<tr>
			<th><b>Nome:</b></th>
			<th><b>Editar</b></th>
			<th><b>Excluir</b></th>
		  </tr>';
	//Preenche a variavel como array, contendo valores da consulta, repete o loop até exibit todos os dados
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		
		echo '<tr>
				<td style="text-align: center">'.$row['nome'].'</td>
				<td style="text-align: center"><a href="edit_categoria.php?cid='.$row['categoria_id'].'">Editar</a></td>
				<td style="text-align: center"><a href="del_categoria.php?cid='.$row['categoria_id'].'">Excluir</a></td>
			  </tr>';
		}
	
	
		echo '</table></div>';
	}
?>

<?php
	include('footer.php');
?>