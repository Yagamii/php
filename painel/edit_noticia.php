<?php
	$titulo_pagina = "Editar noticia";
	include('../header.php');
	
	$nid = $_GET['nid'];
	require_once('../../mysqli_phpconnect.php');
	
	if(isset($_POST['enviado'])){
		$erros = array();
		
		$permitido = array ('image/jpeg', 'image/png', 'image/JPG', 'image/PNG');
		
		if(empty($_POST['titulo'])){
			$erros[] = 'Campo de titulo em branco';
		}else{
			$ti = trim($_POST['titulo']);
		}
		
		if(empty($_POST['corpo'])){
			$erros[] = 'Campo de corpo vazio';
		}else{
			$co = $_POST['corpo'];
		}
		
		if(in_array($_FILES['thumb']['type'], $permitido)){
			if(move_uploaded_file($_FILES['thumb']['tmp_name'], "../includes/uploads/thumbnail/{$_FILES['thumb']['name']}")){
				$thumb = $_FILES['thumb']['name'];
			}
		}else{
			$erros[] = 'Você tentou enviar um arquivo com formato inválido.';
		}
		
		if(empty($_POST['categoria'])){
			$erros[] = 'Não escolheu uma categoria';
		}else{
			$cat = $_POST['categoria'];
		}
		
		if(empty($erros)){
			$q = "UPDATE noticias SET titulo='$ti', corpo='$co', thumbnail='$thumb', categoria_id='$cat' WHERE noticia_id='$nid'";
			$r = mysqli_query($dbc, $q);
			
			if(mysqli_affected_rows($dbc) === 1){
				echo '<p class="sucess">A notícia foi alterada com sucesso.</p>';
			}else{
				echo '<p class="error">A noticia não pode ser alterada devido a um erro no sistema!</p>';
			}
			
		}else{
			echo '<p>Não foi possivel atualizar noticia devido ao(s) seguinte(s) erro(s):</p>';
				echo '<p class="error">';
				foreach($erros as $msg){
					echo '- '.$msg.'.';
				}
				echo '</p>';
		}
	}
	
	
	if($_SESSION['nivel_usuario'] > 0){
		if(isset($_GET['nid']) && is_numeric($_GET['nid'])){
		
			$q = "SELECT * FROM noticias INNER JOIN categorias ON noticias.categoria_id = categorias.categoria_id INNER JOIN usuarios ON noticias.usuario_id=usuarios.usuario_id WHERE noticia_id = '$nid'";
			$r = mysqli_query($dbc, $q);
			
			if(mysqli_num_rows($r) === 1){
				$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
				
				echo '<h1 align="center">Editar notícia</h1>';
				
				echo '<div align="center"><br/><table ><form enctype="multipart/form-data" action="edit_noticia.php?nid='.$nid.'" name="editar" method="post">
						<tr>
							<td><p>Titulo: </p></td> <td><p> <input type="text" size="60px" name="titulo" value="'.$row['titulo'].'" /></p></td>
						</tr>
						<tr>
							<td valign="top"><p>Corpo: </td> <td><p> <textarea name="corpo" cols="62" rows="12">'.$row['corpo'].'</textarea></p></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><img align="center" src="../includes/uploads/thumbnail/'.$row['thumbnail'].'" height="200" width="300" /></td>
						</tr>
						<tr>
							<td><p>Thumb:</p></td> <td><p align="left"><input type="file" name="thumb" /></p></td>
						</tr>
						<tr>
							<td> <p>Categoria:</p> </td> <td ><p align="left"><select name="categoria">';
							
							$q = "SELECT * FROM categorias ORDER BY categoria ASC";
							$r = mysqli_query($dbc, $q);
							
							if(mysqli_num_rows($r) > 0 ){
								while($catrow = mysqli_fetch_array($r, MYSQLI_ASSOC)){
									if($catrow['categoria_id'] === $row['categoria_id']){
										echo '<option selected value="'.$catrow['categoria_id'].'">'.$catrow['categoria'].'</option>';
									}else{
										echo '<option value="'.$catrow['categoria_id'].'">'.$catrow['categoria'].'</option>';
									}
								}
							}
							
				echo '</p></select></td>
						<tr>
							<td><p>Autor: </p></td><td><p align="left"><input type="text" disabled value="'.$row['usuario'].'" /></p></td>
						</tr>
						<tr>
							<td colspan="2"><p align="center"><input type="hidden" name="enviado" value="TRUE" />
							<input type="submit" name="editar" value="Editar" /></p></td>
						</tr>';
						
				echo '</form></table></div>';
			}
			
		}
	}
?>

<?php
	include('../footer.php');
?>