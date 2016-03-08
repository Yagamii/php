<?php
	$titulo_pagina = "Registro";
	include ('header.html');
	
	
	if(isset($_POST['submitted'])){
		//array para guardar erros ocorridos
		$erros = array();
		
		//Verificação do campo de nome
		if(empty($_POST['nome'])){
			$erros[] = 'Você não inseriu seu nome.';
		}else{
			$nome = trim($_POST['nome']);
		}
		
		//Verificação do campo de sobrenome
		if(empty($_POST['sobrenome'])){
			$erros[] = 'Você não inseriu seu sobrenome.';
		}else{
			$snome = trim($_POST['sobrenome']);
		}
		
		//Vericiação do campo de usuario
		if(empty($_POST['usuario'])){
			$erros[] = 'Você não inseriu seu usuário.';
		}else{
			$usuario = trim($_POST['usuario']);
		}
		
		//Verificação do campo de email
		if(empty($_POST['email'])){
			$erros[] = 'Você não inseriu seu email.';
		}else{
			$email = trim($_POST['email']);
		}
		
		//Verificação do campo de senhas
		if(!empty($_POST['senha'])){
			if($_POST['senha'] != $_POST['csenha']){
				$erros[] = 'Sua senha está diferente da confirmação de senha.';
			}else{
				$senha = trim($_POST['senha']);
			}
		}else{
			$erros[] = 'Você não inseriu sua senha.';
		}
		
		//Caso a variavel de erros estiver correta, prosseguir com o cadastro
		if(empty($erros)){
			require_once('../mysqli_phpconnect.php');
			
			$q = "INSERT INTO usuarios (nome, sobrenome, usuario, pass, email, data_registro) VALUES ('$nome', '$snome', '$usuario', SHA1('$senha'), $email, NOW() )";
			$r = @mysqli_query ($dbc, $q);
			
			if($r){
				echo '<h1>Parabéns</h1>
					<p>Agora você esta registrado e poderá se conectar na página de login!</p><p><br /></p>';
			}else{
				echo '<h1>Erro do sistema</h1>
					<p>Você não pôde se registrar devido a um erro do sistema. Pedimos desculpa pela inconveniencia.</p>';
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
			}
		}
	}
	
?>


<h1 align="center">Registro</h1>
	<div align="center"><form name="registro" action="registro.php" method="POST">
    <table border="0" >
    <tr>
		<td><p>Nome:</p></td>
    	<td><p><input type="text" name="nome" value="<?php if(isset($_POST['nome'])){ echo $_POST['nome'];} ?>" /></p></td>
    </tr>
    <tr>
    	<td><p>Sobrenome:</p></td> 
        <td><p><input type="text" name="sobrenome" value="<?php if(isset($_POST['sobrenome'])){ echo $_POST['sobrenome'];} ?>" /></p></td>
    </tr>
    <tr>
    	<td><p>Usuário:</p></td>
        <td><p><input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])){ echo $_POST['usuario'];} ?>" /></p></td>
    </tr>
    <tr>
    	<td><p>Email:</p></td>
        <td><p><input type="text" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" /></p></td>
    </tr>
    <tr>
    	<td><p>Senha:</p></td>
        <td><p><input type="password" name="senha" /></p></td>
    </tr>
    <tr>
    	<td><p>Confirmação de senha:</p></td>
        <td><p><input type="password" name="csenha" /></p></td>
    </tr>
	<tr>
    	
    	
        <td colspan="2"><p align="center"> <input type="hidden" name="submitted" />
        	<input type="submit" value="Registrar" name="submit" />
       </p></td>
	</table>
    </form>
    </div>

<?php

	include('footer.html');
?>