<?php
	$titulo_pagina = "Adicionar notícia";
	include('../header.php');
	
	require_once('../../mysqli_phpconnect.php');
	
	if(isset($_POST['enviado'])){
		$erros = array();
		
		$permitido = array ('image/jpeg', 'image/png', 'image/JPG', 'image/PNG');
		
		if(empty($_POST['titulo'])){
			$erros[] = "O campo de título está em branco.";
		}else{
			$titulo = $_POST['titulo'];
		}
		
		if(empty($_POST['corpo'])){
			$erros[] = "O campo de texto está em branco.";
		}else{
			$corpo = $_POST['corpo'];
		}
		
		if(in_array($_FILES['thumb']['type'], $permitido)){
			if(move_uploaded_file($_FILES['thumb']['tmp_name'], "../includes/uploads/thumbnail/{$_FILES['thumb']['name']}")){
				$thumb = $_FILES['thumb']['name'];
			}
		}else{
			$erros[] = "Você enviou uma imagem com formato inválido.";
		}
		
		if(empty($_POST['categoria'])){
			$erros[] = "O campo de categoria está em branco.";
		}else{
			$categoria = $_POST['categoria'];
		}
		
		$autor = $_SESSION['usuario_id'];
		
		if(empty($erros)){
			$q = "INSERT INTO noticias (titulo, corpo, data_noticia, thumbnail, categoria_id, usuario_id) VALUES ('$titulo', '$corpo', NOW(), '$thumb', '$categoria', '$autor')";
			$r = mysqli_query($dbc, $q);
			
			if($r){
				echo '<p class="sucess">Notícia adicionada com sucesso!</p>';
			}else{
				echo '<h2>Erro do sistema</h2>
					<p class="error">Você não pôde adicionar a notícia devido a um erro do sistema. Pedimos desculpa pela inconveniencia.</p>';
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
			}
		}
		
	}
	
	
	
	echo '<h1 align="center">Adicionar notícia</h1>

		<div align="center"><form enctype="multipart/form-data" name="addMateria" action="add_noticia.php" method="post">
			<table border="0">
    	<tr>
        	<td><p>Título:</p></td>
        	<td><p><input type="text" name="titulo" size="53" /></p></td>
        </tr>
        <tr>
        	<td valign="top"><p >Texto:</p></td>
            <td><p><textarea name="corpo" cols="55" rows="7"></textarea></p></td>
        </tr>
		<tr>
			<td><p>Thumbnail:</p></td>
			<td><p align="left"><input type="file" name="thumb" /></p></td>
		</tr>
        <tr>
        	<td><p>Categoria:</p></td>
            <td><p align="left"><select name="categoria">';
            	
				
            		$q = "SELECT * FROM categorias ORDER BY categoria ASC";
					$r = mysqli_query($dbc, $q);
					
					if(mysqli_num_rows($r) > 0){
						
						while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
							echo '<option value="'.$row['categoria_id'].'">'.$row['categoria'].'</option>';
						}
					}
				
          echo  '</select>
            </p></td>
        </tr>
		<tr>
			<td colspan="2"><p align="center"><input type="hidden" name="enviado" value="TRUE">
							<input type="submit" name="adicionar" value="Adicionar"></p>
		</td>
    </table>
</form>
</div>
	';
	
	
?>


<?php
	include('../footer.php');
?>