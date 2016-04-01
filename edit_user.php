<?php
	$titulo_pagina = 'Editar dados';
	include('header.php');
	
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
		
		$permitido = array ('image/jpeg', 'image/png', 'image/JPG', 'image/PNG');
		
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
		
		if(in_array($_FILES['imguser']['type'], $permitido)){
			if(move_uploaded_file($_FILES['imguser']['tmp_name'], "includes/uploads/user/{$_FILES['imguser']['name']}")){
				$img = $_FILES['imguser']['name'];
			}
		}else{
			$erros[] = 'Você escolheu uma imagem com formato inválido.';
		}
		
		if(empty($erros)){
			
				$q = "UPDATE usuarios SET nome='$nome', sobrenome='$snome', user_img='$img' WHERE usuario_id='$uid' LIMIT 1";
				$r = mysqli_query($dbc, $q);
				
				if(mysqli_affected_rows($dbc) == 1){
					echo '<p>As informações do usuário foram atualizadas com sucesso</p>';
				}else{
					echo '<p class="error">O usuário não pôde ser atualizado por um erro do sistema.</p>';
					
					echo '<p>' . mysqli_error($dbc) . '<br />Query: '. $q.'</p>';
				}	
		}else{
			echo '<p class="error">Ocorreu os seguintes erros:<br />';
			foreach($erros as $msg){
				echo " - $msg<br />\n";
			}
		}
	
	}
	
	
	$q = "SELECT * FROM usuarios WHERE usuario_id='$uid'";
	$r = mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) == 1){
		
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		
		
		
		
		echo '<h1 align="center">Editar dados</h1>
			<div align="center"><form enctype="multipart/form-data" name="editar" action="edit_user.php" method="POST">
				<table border="0">
				 <tr>
    				<td><p>Usuário:</p></td>
     			   <td><p><input disabled type="text" name="usuario" value="'.$row['usuario'].'" /></p></td>
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
      			    <td><p><input disabled type="text" name="email" value="'.$row['email'].'" /></p></td>
   				</tr>
				<tr>
					<td colspan="2"><p><img src="includes/uploads/user/'.$row['user_img'].'" width="200" height="200"/></p></td>
				</tr>
				<tr>
					<td><p>Imagem:</p></td>
					<td><p align="left"><input type="file" name="imguser" /></p></td>
				</tr>
				<tr>
				<td colspan="2"><p align="center"> 
        			<input type="hidden" name="enviado" value="TRUE" />
        			<input type="submit" value="Atualizar" name="att" />
					<input type="hidden" name="uid" value="'.$uid.'"/>
      			 </p></td></tr>
				</table>
			</div>
				';
		
	}
?>

<?php
	include('footer.php');
?>