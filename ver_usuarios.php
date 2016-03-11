<?php
	$titulo_pagina = "Lista de usuários";
	include ('header.php');
	
	echo '<h1 align="center">Lista de usuários</h1>';
	
	require_once '../mysqli_phpconnect.php';
	
	//Quantos usuarios serão exibidos por pagina
	$mostrar = 10;
	
	//Verifica se foi definido numero de paginas, caso contrario, calcula quantos registros tem no banco de dados 
	if(isset($_GET['p']) && is_numeric($_GET['p'])){
		$paginas = $_GET['p'];
	}else{
		$q = "SELECT COUNT(usuario_id) FROM usuarios";
		$r = mysqli_query($dbc, $q);
		$row = mysqli_fetch_array($r, MYSQLI_NUM);
		
		$registros = $row[0];
		
		if($registros > $mostrar){
			$paginas = ceil($registros/$mostrar);
		}else{
			$paginas = 1;
		}
	}
	
	//Faz a verificação de onde deve continuar a listagem de usuarios por pagina
	if(isset($_GET['s']) && is_numeric($_GET['s'])){
		$começo = $_GET['s'];
	}else{
		$começo = 0;
	}
	
	//Consulta para puxar informações dos usuarios
	$q = "SELECT * FROM usuarios ORDER BY data_registro ASC LIMIT $começo, $mostrar";
	$r = mysqli_query($dbc, $q);
	
	//Cabeçalho da tabela de usuarios
	echo '<table align="center" cellspacing="0" cellpadding="5" width="100%">
		<tr>
			<td align="left"><b>Usuário</b></td>
			<td align="left"><b>Nome</b></td>
			<td align="left"><b>Email</b></td>
			<td align="left"><b>Cargo</b></td>
			<td align="left"><b>Editar</b></td>
			<td align="left"><b>Excluir</b></td>
		</tr>';
	
	$bg = '#eeeeee';
	
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		
		$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		
		if($row['nivel_usuario'] == 1){
			$cargo = 'Moderador';
		}elseif($row['nivel_usuario'] == 2){
			$cargo = 'Administrador';
		}else{
			$cargo = 'Leitor';
		}
		
		echo '<tr bgcolor="'.$bg.'">
			<td align="left">'.$row['usuario'].'</td>
			<td align="left">'.$row['nome'].' '.$row['sobrenome'].'</td>
			<td align="left">'.$row['email'].'</td>
			<td align="left">'.$cargo.'</td>
			<td align="left"><a href="edit_usuario.php?uid='.$row['usuario_id'].'">Editar</a></td>
			<td align="left"><a href="del_usuario.php?uid='.$row['usuario_id'].'">Excluir</a></td>
		</tr>';
	}
	
	echo '</table>';
	
	if($paginas > 1){
		echo '<br /><p>';
		
		$pagina_atual = ($começo/$mostrar) + 1;
		
		if($pagina_atual != 1){
			echo '<a href="ver_usuarios.php?s='.($começo - $mostrar).'&p='.$paginas.'">Anterior</a>';
		}
		
		for($i = 1; $i <= $paginas; $i++){
			if($i != $pagina_atual){
				echo '<a href="ver_usuarios.php?s='.(($começo*($i-1))).'&p='.$paginas.'">'.$i.'</a>';
			}else{
				echo $i .'';
			}
		}
		
		if($pagina_atual != $paginas){
			echo '<a href="vew_usuarios.php?s='.($começo+$mostrar).'&p='.$paginas.'">Próxima</a>';
		}
		
	}
	
?>
    	

<?php
	include('footer.php');
?>