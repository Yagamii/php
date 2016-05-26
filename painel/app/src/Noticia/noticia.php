<?php
	class Noticia extends Padrao{
		
		function addNoticia($titulo, $corpo, $thumb, $categoria){
			try{
				$_titulo = $this->verificarCampo($titulo);
				$_corpo = $this->verificarCampo($corpo);
				$_thumb = $this->verificarImagem($_FILES['thumb']['type'], $_FILES['thumb']['name'], $_FILES['thumb']['tmp_name']);
				if(!$_titulo || !$_corpo)
					throw new Exception("Por favor, insira as informações da noticia corretamente.");
					
				if(!$_thumb)
					throw new Exception("Por favor insira uma imagem válida.");
					
				$autor = $_SESSION['usuario_id'];
			
				$q = "INSERT INTO noticias(titulo, corpo, data_noticia, thumbnail, categoria_id, usuario_id) VALUES ('$_titulo', '$_corpo', NOW(), '$_thumb', '$categoria', '$autor')";
				$r = $this->Dbc->query($q);
				
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function editNoticia($id, $titulo, $corpo){
			try{
				$_titulo = $this->verificarCampo($titulo);
				$_corpo = $this->verificarCampo($corpo);
				$_thumb = $this->verificarImagem($_FILES['thumb']['type'], $_FILES['thumb']['name'], $_FILES['thumb']['tmp_name']);
				$_categoria = $_POST['categoria'];
				
				if(!$_titulo || !$_corpo)
					throw new Exception("Por favor preencha os campos corretamente.");
					
				if(!$_thumb):
					$q = "UPDATE noticias SET titulo='$_titulo', corpo='$_corpo', categoria_id='$_categoria' WHERE noticia_id='$id'";
					else:
					$q = "UPDATE noticias SET titulo='$_titulo', corpo='$_corpo', categoria_id='$_categoria', thumbnail='$_thumb' WHERE noticia_id='$id'";
					endif;
				$r = $this->Dbc->query($q);
				
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function getTodasNoticias(){
			try{
				$q = "SELECT *, DATE_FORMAT(data_noticia, '%d/%b/%Y') AS data FROM noticias INNER JOIN categorias ON noticias.categoria_id=categorias.categoria_id INNER JOIN usuarios ON noticias.usuario_id=usuarios.usuario_id";
				$r = $this->Dbc->query($q);
				
				if(mysqli_num_rows($r) < 1)
					throw new Exception("Nenhuma noticia encontrada.");
				
				return $r;
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function getNoticia($id){
			$q = "SELECT * FROM noticias INNER JOIN categorias ON noticias.categoria_id=categorias.categoria_id INNER JOIN usuarios ON noticias.usuario_id=usuarios.usuario_id WHERE noticias.noticia_id='$id'";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		
		function deletarNoticia($id){
			$q = "DELETE FROM noticias WHERE noticia_id='$id'";
			$r = $this->Dbc->query($q);
		}
		
		function getCategorias(){
			$q = "SELECT * FROM categorias ORDER BY categoria ASC";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
	}
?>