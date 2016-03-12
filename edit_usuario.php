<?php
	$titulo_pagina = "Editar usuário";
	include ('header.php');
	
	if(isset($_GET['uid']) && is_numeric($_GET['uid'])){
		$uid = $_GET['uid'];
	}elseif(isset($_POST['uid']) && is_numeric($_POST['uid'])){
		$uid = $_POST['uid'];
	}else{
		echo '<p class="error">Esta pagina foi acessada com um erro.</p>';
		
		exit();
	}
	
	require_once '../mysqli_phpconnect.php';
	
	if(isset($_POST['enviado'])){
		
		$erros = array();
		
		if(empty($_POST['usuario'])){
			$erros[] = 'O campo usuário está em branco.';
		}else{
			$usuario = $_POST['usuario'];
		}
		
		if(empty($_POST['nome'])){
			$erros[] = 'O campo nome está em branco.';
		}else{
			$nome = $_POST['nome'];
		}
		
		if(empty($_POST['sobrenome'])){
			$erros[] = 'O campo sobrenome está em branco.';
		}else{
			$snome = $_POST['sobrenome'];
		}
		
		if(empty($_POST['email'])){
			$erros[] = 'O campo email está em branco.';
		}else{
			$email = $_POST['email'];
		}
		
		if(empty($_POST['nivel'])){
			$erros[] = 'Não foi selecionado um nivel para o usuário.';
		}else{
			$nivel = $_POST['nivel'];
		}
		
		require_once '../mysqli_phpconnect.php';
		
		if(empty($erros)){
			
			$q = "SELECT usuario_id FROM usuarios WHERE email='$email' AND usuario_id != $uid";
			$r = mysqli_query($dbc, $q);
			
			if(mysqli_num_rows($r) == 0){
				
				$q = "UPDATE usuarios SET nome='$nome', sobrenome='$snome', usuario='$usuario', email='$email', nivel_usuario='$nivel' WHERE usuario_id='$uid' LIMIT 1";
				$r = mysqli_query($dbc, $q);
				
				if(mysqli_affected_rows($dbc) == 1){
					echo '<p>As informações do usuário foram atualizadas com sucesso</p>';
				}else{
					echo '<p class="error">O usuário não pôde ser atualizado por um erro do sistema.</p>';
					
					echo '<p>' . mysqli_error($dbc) . '<br />Query: '. $q.'</p>';
				}
				
			}else{
				echo '<p class="error">O email inserido já esta sendo utilizado.</p>';
			}
			
		}else{
			echo '<p class="error">Ocorreu os seguintes erros:<br />';
			foreach($erros as $msg){
				echo " - $msg<br />\n";
			}
		}
		
		
	}
	
	$q = "SELECT * FROM usuarios WHERE usuario_id=$uid";
	$r = mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) == 1){
		
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		
		
		
		
		echo '<h1 align="center">Editar usuário</h1>
			<div align="center"><form name="editar" action="edit_usuario.php" method="POST">
				<table border="0">
				 <tr>
    				<td><p>Usuário:</p></td>
     			   <td><p><input type="text" name="usuario" value="'.$row['usuario'].'" /></p></td>
   				 </tr>
   				 <tr>
					<td><p>Nome:</p></td>
    				<td><p><input type="text" name="nome" value="'.$row['nome'].'" /></p></td>
   				 </tr>
   				 <tr>
    				<td><p>Sobrenome:</p></td> 
     			   <td><p><input type="text" name="sobrenome" value="'.$row['sobrenome'].'" /></p></td>
   				 </tr>
 			     
    			<tr>
    				<td><p>Email:</p></td>
      			    <td><p><input type="text" name="email" value="'.$row['email'].'" /></p></td>
   				</tr>
				<tr>
					<td><p>Nivel do usuário:</p></td>
					<td><p><select name="nivel" width="50">';
				
				$q = "SELECT * FROM nivel_usuario";
				$r = mysqli_query($dbc, $q);
				
				if(mysqli_num_rows($r) > 0){
					while($nivel_row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
						echo '<option value="'.$nivel_row['nivel_usuario'].'" >'.$nivel_row['nome_nivel'].'</option>';
					}
				}
							
				echo'	</select></p></td>
				</tr>
				<td colspan="2"><p align="center"> 
        			<input type="hidden" name="enviado" value="TRUE" />
        			<input type="submit" value="Atualizar" name="att" />
					<input type="hidden" name="uid" value="'.$uid.'"/>
      			 </p></td>
				</table>
			</div>
				';
	}
?>

<?php
	include('footer.php');
?>