<?php
	$titulo_pagina = "Ver notícias";
	include ('../header.php');
	//Verificar o nivel do usuario que esta acessando a pagina
	if($_SESSION['nivel_usuario'] > 0){
		require_once('../../mysqli_phpconnect.php');
		//cabeçalho da pagina
		echo '<h1 align="center">Lista de notícias</h1>';
		
		$q = "SELECT *, DATE_FORMAT(data_noticia, '%d/%b/%Y') AS data FROM noticias INNER JOIN categorias ON noticias.categoria_id = categorias.categoria_id INNER JOIN usuarios ON noticias.usuario_id = usuarios.usuario_id";
		$r = mysqli_query($dbc,$q);
		
		$bg = '#E3E3E6';
		
		if(mysqli_num_rows($r) > 0){
			
			echo '<div align="center"><table cellspacing="2" cellpadding="5" width="100%">
					<tr>
						<th>Titulo</th>
						<th>Categoria</th>
						<th>Autor</th>
						<th>Publicado em</th>
						<th>Editar</th>
						<th>Apagar</th>
					</tr>';
			while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
					$bg = ($bg=='#E3E3E6' ? '#ffffff' : '#E3E3E6');
					echo '<tr bgcolor='.$bg.'>
							<td>'.$row['titulo'].'</td>
							<td>'.$row['categoria'].'</td>
							<td>'.$row['usuario'].'</td>
							<td>'.$row['data'].'</td>
							<td><a href="edit_noticia.php?nid='.$row['noticia_id'].'">Editar</a></td>
							<td><a href="del_noticia.php?nid='.$row['noticia_id'].'">Apagar</a></td>
							</tr>';
			}
			echo '</table></div>';
		}
		
	}else{
		echo '<p align="center" class="error">Você não tem permissão para acessar essa página.</p>';
	}
?>

<?php 
	include('../footer.php');
?>