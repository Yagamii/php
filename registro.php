<?php
	$titulo_pagina = "Inicio";
	include ('header.html');
?>

<h1 align="center">Registro</h1>
	<div align="center"><table border="0" >
    <tr>
		<td><p>Nome:</p></td>
    	<td><p><input type="text" name="nome" value="<?php if(isset($_POST['nome'])){ echo $_POST['nome'];} ?>" /></p></td>
    </tr>
    <tr>
    	<td><p>Sobrenome:</p></td> 
        <td><p><input type="text" name="sobrenome" value="<?php if(isset($_POST['sobrenome'])){ echo $_POST['sobrenome'];} ?>" /></p></td>
    </tr>
    <tr>
    	<td><p>Apelido:</p></td>
        <td><p><input type="text" name="apelido" value="<?php if(isset($_POST['apelido'])){ echo $_POST['apelido'];} ?>" /></p></td>
    </tr>
    <tr>
    	<td><p>Email:</p></td>
        <td><p><input type="text" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" /></p></td>
    </tr>
    <tr>
    	<td><p>Senha:</p></td>
        <td><p><input type="password" name="senha" value="<?php if(isset($_POST['senha'])){ echo $_POST['senha'];} ?>" /></p></td>
    </tr>
    <tr>
    	<td><p>Confirmação de senha:</p></td>
        <td><p><input type="password" name="csenha" value="<?php if(isset($_POST['csenha'])){ echo $_POST['csenha'];} ?>" /></p></td>
    </tr>
	<tr>
    	
    	<td><p></p></td>
        <td><p align="left"><input type="hidden" name="enviado" />
        <input type="submit" name="enviar" value="Cadastrar" /></p></td>
	</table>
    </div>
<?php
	include('footer.html');
?>