<?php
	$titulo_pagina = 'Login';
	include ('header.html');
?>

	<h1 align="center">Login</h1>
    <div align="center"><table border="0">
    <tr>
    	<td><p>Usuário:</p></td>
        <td><p><input type="text" name="apelido" /></p></td>
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
<?php
	include ('footer.html');
?>