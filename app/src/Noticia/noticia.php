<?php
	class Noticia extends Padrao{
		function getNoticia($id){
			try{
				if(!is_numeric($id))
					throw new Exception("Não foi possivel acessar a página.");
			
				$q = "SELECT *, DATE_FORMAT(data_noticia, '%d/%b/%Y') AS data FROM noticias INNER JOIN usuarios ON noticias.usuario_id=usuarios.usuario_id WHERE noticias.noticia_id = '$id'";
				$r = $this->Dbc->query($q);
				
				if(mysqli_num_rows($r) == 0)
					throw new Exception("Não foi possivel acessar a página.");
				
				return $r;
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function addComent($comentario){
			try{
				$_comentario = $this->verificarCampo($comentario);
				
				if(!$_comentario)
					throw new Exception("Comentário invalido.");
				
				$q = "INSERT INTO comentarios (usuario_id, mensagem, noticia_id, data_coment) VALUES ('$_SESSION[usuario_id]', '$_comentario', '".id."', NOW())";
				$r = $this->Dbc->query($q);
				
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function getComents($id){
			try{
				
				$q = "SELECT *, DATE_FORMAT(data_coment, '%k:%i - %d %b %Y') AS data FROM comentarios INNER JOIN usuarios ON comentarios.usuario_id=usuarios.usuario_id WHERE comentarios.noticia_id = '$id' ORDER BY comentarios.data_coment ASC";
				$r = $this->Dbc->query($q);
				
				if(mysqli_num_rows($r) <= 0){
					echo '<p align="center" style="color: #C63">Essa notícia não tem nenhum comentário ainda, seja o primeiro a comentar. :D</p>';
					throw new Exception();}
				
				return $r;
				
				
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function delComent($id){
			try{
				if($_SESSION['nivel_usuario'] === 0)
					throw new Exception("Você não tem permissão para executar essa ação.");
					
				$q = "DELETE FROM comentarios WHERE comentario_id = '$id'";
				$r = $this->Dbc->query($q);
				
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function verAvaliacao($uid, $nid){
			$q = "SELECT avaliacao FROM avaliacao WHERE usuario_id='$uid' AND noticia_id='$nid'";
			$r = $this->Dbc->query($q);
			
			return $r;
			
		}
		
		function avaliar($ava, $uid, $nid){
			try{
				if(!isset($ava))
					throw new Exception("Por favor, escolha uma avaliação.");
					
				$q = "INSERT INTO avaliacao(usuario_id, avaliacao, noticia_id) VALUES ('$uid', '$ava', '$nid')";
				$r = $this->Dbc->query($q);
				
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
	}
?>