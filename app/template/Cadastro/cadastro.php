<h1 align="center">Cadastro</h1>
	<div align="center" id="cadastro"><form name="registro" action="index.php?page=cadastro&action=cadastrar" method="POST">
    <table border="0">
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
    	
    	
        <td colspan="2"><p align="center"> 
        	<input type="hidden" name="submitted" value="TRUE" />
        	<input type="submit" value="Cadastrar" name="submit" />
       </p></td>
	</table>
    </form>
    </div>