<?php
	$titulo_pagina = "Editar categorias";
	include('header.php');
	
	$cid = $_GET['cid'];
	require_once('../mysqli_phpconnect.php');
	
	if(isset($_POST['editcat'])){
		
		if(empty($_POST['nome'])){
			$erro = '<p class="error">Você deixou o campo de nome vazio!</p>';
		}else{
			$nome = trim($_POST['nome']);
		}
		
		if(empty($erro)){
			$q = "SELECT * FROM categorias WHERE nome='$nome'";
			$r = mysqli_query($dbc, $q);
			
			if(mysqli_affected_rows($dbc) === 0){
				$q = "UPDATE categorias SET nome='$nome' WHERE categoria_id='$cid' LIMIT 1";
				$r = mysqli_query($dbc, $q);
				
				if(mysqli_affected_rows($dbc) === 1){
					echo '<p class="sucess">A categoria foi alterada com sucesso!</p>';
				}else{
					echo '<p class="error">A categoria não pode ser alterada por falha no sistema.</p>';
				}
			}else{
				echo '<p class="error">Já existe uma categoria com este nome</p>';
			}
			
		}else{
			echo $erro;
		}
		
	}
	
	if($_SESSION['nivel_usuario'] > 0){
		if(isset($_GET['cid']) && is_numeric($_GET['cid'])){
			
			$q = "SELECT * FROM categorias WHERE categoria_id='$cid'";
			$r = mysqli_query($dbc, $q);
			
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			
			echo '<h1 align="center">Editar categoria</h1>';
			
			echo '<br/><div align="center"><form action="edit_categoria.php?cid='.$cid.'" name="editcat" method="post">
					<table border="0">
						<tr>
							<td><p>Nome:</p></td>
							<td><p><input type="text" name="nome" value="'.$row['nome'].'" /></p></td>
						</tr>
						<tr >
							<td colspan="2"><p align="center"><input type="hidden" name="editcat" value="TRUE" />
								<input type="submit" name="edit" value="Alterar" /></p>
								</td>
						</tr>
					</table></div>
					</form>';
		}
	}
?>

<?php
	include('footer.php');
?>