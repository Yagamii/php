<?php
	$titulo_pagina = 'Deletar categoria';
	include('header.php');
	
	$cid = $_GET['cid'];
	require_once('../mysqli_phpconnect.php');
	
	if(isset($_POST['deletar'])){
		$q = "DELETE FROM categorias WHERE categoria_id='$cid'";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_affected_rows($dbc) === 1){
			echo '<p class="sucess">A categoria foi excluida com sucesso!</p>';
		}else{
			echo '<p class="error">Não foi possivel excluir a categoria devido a um erro do sistema.</p>';
		}
	}
	
	if($_SESSION['nivel_usuario'] > 0){
		if(isset($_GET['cid'])){
			$q = "SELECT * FROM categorias WHERE categoria_id='$cid'";
			$r = mysqli_query($dbc, $q);
			
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			
			echo '<h1 align="center">Deletar categoria</h1>';
			
			echo '<p align="center"> Você tem certeza que deseja excluir a categoria: <b>'.$row['nome'].'</b>?</p>';
			
			echo '<br/><div align="center"><form name="delcat" action="del_categoria.php?cid='.$cid.'" method="post">
				  <input type="hidden" name="deletar" value="TRUE" />
				  <input type="submit" name="delecat" value="Excluir" /></div></form>';
		}
	}
?>

<?php
	include('footer.php');
?>