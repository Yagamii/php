<?php
	$titulo_pagina = 'Login';
	include ('header.html');
	
	ini_set("display_errors", 1);
	
	if(isset($_POST['logando'])){
		$erros = array();
		include_once '../mysqli_phpconnect.php';
		//Verifica se o campo de usuario esta vazio
		if(empty($_POST['usuario'])){
			$erros[] = 'Você esqueceu de inserir o usuário';
		}else{
			$usuario = mysqli_real_escape_string($dbc, trim($_POST['usuario']));
		}
		
		//Verifica se o campo de senha esta vazio
		if(empty($_POST['senha'])){
			$erros[] = 'Você esqueceu de inserir a senha';
		}else{
			$senha = mysqli_real_escape_string($dbc, trim(md5($_POST['senha'])));
		}
		
		if(empty($erros)){
			
			
			$q = "SELECT * FROM usuarios WHERE usuario='$usuario' AND pass='$senha'";
			$r = mysqli_query($dbc,$q);
			
			
			if(mysqli_num_rows($r) == 1){
				$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
				
				
				session_start();
				$_SESSION['usuario_id'] = $row['usuario_id'];
				$_SESSION['usuario'] = $row['usuario'];
				
				$logado = 'logado.php';
				header("Location: $logado");
				exit();
				
			}else{
				echo '<h1>Erro!</h1>';
				echo '<p class="error">O usuário e a senha que você digitou não coincidem.</p>';
			}
			
			
		}else{
			foreach($erros as $erro){
				echo '<ul><li> <p class="error">'. $erro .'</p></li></ul>';
			}
		}
	}
?>
	<form name="login" action="login.php" method="POST">
	<h1 align="center">Login</h1>
    <div align="center"><table border="0">
    <tr>
    	<td><p>Usuário:</p></td>
        <td><p><input type="text" name="usuario" /></p></td>
    </tr>
    <tr>
    	<td><p>Senha:</p></td>
        <td><p><input type="password" name="senha" /></p></td>
    </tr>
    <tr>
    	<td><p></p></td>
        <td><p align="left"><input type="hidden" name="logando" />
        <input type="submit" name="logar" value="Logar" /></p>
        </td>
    </tr>
    </table>
    </div>
    </form>
<?php
	include('footer.html');
?>