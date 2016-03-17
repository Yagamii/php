<?php
	$titulo_pagina = 'Ver noticia';
	include('header.php');
	
	
	
	require_once('../mysqli_phpconnect.php');
	//Verifica se possui um id de noticia
	if(isset($_GET['nid'])){
		$nid = $_GET['nid'];
		//Faz consulta em inner join com usuarios, para ter informação completa da noticia e nome do autor da noticia
		$q = "SELECT *, DATE_FORMAT(data_noticia, '%d/%b/%Y') AS data FROM noticias INNER JOIN usuarios ON noticias.usuario_id = usuarios.usuario_id WHERE noticias.noticia_id = '$nid'";
		$r = mysqli_query($dbc, $q);
		//Verifica se retornou apenas 1 valor na consulta
		if(mysqli_num_rows($r) === 1){
			//alimenta a variavel fazendo ela virar uma array, com referencia aos valores consultados no banco de dados, utilizando o modo de associação com as colunas da tabela
			$noticia = mysqli_fetch_array($r, MYSQLI_ASSOC);			
			//Mostra na tela titulo, data, autor e corpo da mensagem
			echo '<h1 align="center">'.$noticia['titulo'].'</h1>';
			echo '<div align="center" style="font-size: 12px">Postado em '.$noticia['data'].' por '.$noticia['usuario'].'</div>';
			echo '<div style="border-bottom: 1px dashed; padding-bottom: 8px"><p align="justify"> '.nl2br($noticia['corpo']).'</p>';
			
			//Faz a verificação se o usuário enviou o formulário de avaliação
			if(isset($_POST['avaliar'])){
				$erros = array();
				//verificar se a variavel do like esta vazio, se não estiver, guarda o valor na variavel $ava
				if(empty($_POST['like'])){
					$erros = "Você não escolheu uma avaliação.";
				}else{
					$ava = $_POST['like'];
			}
			//recebe id do usuario que está logado no momento
			$uid = $_SESSION['usuario_id'];
			//se não tiver erros, seguir com a query para inserir dados na tabela
			if(empty($erros)){
				$q = "INSERT INTO avaliacao (usuario_id, avaliacao, noticia_id) VALUES ('$uid', '$ava', '$nid')";
				$r = mysqli_query($dbc, $q);
				//se a consulta for bem sucedida retornando 1 valor, informa ao usuario que foi tudo correto
				if(mysqli_affected_rows($dbc) == 1){
					echo '<p class="sucess" align="center">Sua avaliação foi adicionada com sucesso.</p>';
				}
			}else{ //caso a variavel de erros não esteja vazia, mostra ao usuario o que esta faltando
				echo '<p class="error" align="center">'. $erros;
			}
		
		}
			//formulario de avaliação, com 2 opçoes em radio, com curti = 1 e não curti = 2
			echo '<form action="ver_noticia.php?nid='.$nid.'" method="post"><p align="right">
				<input type="radio" name="like" value="1">Curti   |   <input type="radio" name="like" value="2">Não curti</p>
				<div align="right" style="padding-right: 60px; padding-top: 5px"><input type="hidden" name="avaliar" value="TRUE" />
									<input type="submit" name="avaliacao" value="Avaliar" /> </div>
				
				</form></div>';
			//titulo da area de comentarios
			echo '<div style="border-bottom: 1px solid; padding-bottom: 15px ; margin-bottom: 10px"><br/><h2>Comentários</h2>';
			//consulta para puxar todos os comentarios relacionados a noticia atual, com inner join a tabela de usuarios para puxar também o nome do usuario que comentou
			$q = "SELECT *, DATE_FORMAT(data_coment, '%k:%i - %d %b %Y') AS data FROM comentarios INNER JOIN usuarios ON comentarios.usuario_id = usuarios.usuario_id WHERE comentarios.noticia_id = '$nid' ORDER BY comentarios.data_coment ASC";
			$r = mysqli_query($dbc, $q);
			//Se retornar mais de 1 valor, exibe o comentario dos usuarios
			if(mysqli_num_rows($r) > 0){
				while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
					$cid = $row['comentario_id'];
					echo '<div style="border-bottom: 1px dashed; padding-bottom: 5px; border-bottom-color: #C63"><p><b> '.$row['usuario'].'</b> em '.$row['data'].':<br/>
							 '.$row['mensagem'].'</p>';
					if($_SESSION['nivel_usuario'] > 0){
						echo '<div align="right" style="padding-right: 20px"><a href="del_coment.php?cid='.$cid.'">Deletar</a></div>';
					}
					echo '</div>';
				}
			}else{
				echo '<p align="center" style="color: #C63">Essa notícia não tem nenhum comentário ainda, seja o primeiro a comentar. :D</p>';
			}
			echo '</div>';
			//verifica se o usuario enviou o formulario para comentar
			if(isset($_POST['comentou'])){
				$erros = array();
				
				if(empty($_POST['mensagem'])){
					$erros = "Você deixou o campo de comentário vazio";
				}else{
					$mensagem = $_POST['mensagem'];
				}
				
				$uid = $_SESSION['usuario_id'];
				
				if(empty($erros)){
					$q = "INSERT INTO comentarios (usuario_id, mensagem, noticia_id, data_coment) VALUES ('$uid', '$mensagem', '$nid', NOW())";	
					$r = mysqli_query($dbc, $q);
					
					if(mysqli_affected_rows($dbc) == 1){
						echo '<p align="center">Seu comentário foi adicionado com sucesso. :D</p>';
					}else{
						echo '<p align="center" class="error">Não foi possivel adicionar seu comentário devido a uma falha do sistema.';
					}
				}else{
					echo $erros;
				}
				
				
			}
			
			echo '<br/><div style="padding-left: 6px">Logado como: ' .$_SESSION['usuario'].'</div>';
			echo '<form action="ver_noticia.php?nid='.$nid.'" method="post"><p>Comentar:</p> <p><textarea name="mensagem" cols="100" rows="7"></textarea></p>
					<p align="center"><input type="hidden" name="comentou" value="TRUE" />
						<input type="submit" name="comentar" value="Comentar" /></p>
				</form>';
			
			
		}else{
			echo '<p class="error"> Esta pagina não pôde ser acessada por um erro do sistema</p>';
		}
		
		
	}else{
		header("Location: index.php");
		exit();
	}
	
?>

<?php
	include('footer.php');
?>