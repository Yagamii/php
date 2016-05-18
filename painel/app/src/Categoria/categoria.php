<?php

	class Categoria extends Padrao{
		
		function adicionarCategoria($categoria){
			try{
				$_categoria = $this->verificarCampo($categoria);
				
				if(!$_categoria)
					throw new Exception("Por favor, preencha o campo corretamente.");
				
				$q = "INSERT INTO categorias (categoria) VALUES ('$_categoria')";
				$r = $this->Dbc->query($q);
				
				ErrorHandler::setSucess("Categoria adicionada com sucesso.");
			
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function getCategorias(){
			$q = "SELECT * FROM categorias ORDER BY categoria ASC";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		
		function getCategoria($id){
			$q = "SELECT * FROM categorias WHERE categoria_id = '$id'";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		
		function editarCategoria($id, $categoria){
			try{
				$_categoria = $this->verificarCampo($categoria);
				
				if(!$_categoria)
					throw new Exception("Por favor, preencha o campo corretamente.");
				
				$q = "SELECT * FROM categorias WHERE categoria = '$_categoria'";
				$r = $this->Dbc->query($q);
				
				if(mysqli_num_rows($r) > 0)
					throw new Exception("Já existe uma categoria com esse nome.");
				
				$q = "UPDATE categorias SET categoria='$_categoria' WHERE categoria_id = '$id' LIMIT 1";
				$r = $this->Dbc->query($q);
				
				header("Location: index.php?page=categoria");
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function deletarCategoria($id){
			$q = "DELETE FROM categorias WHERE categoria_id = '$id'";
			$r = $this->Dbc->query($q);
			
			header("Location: index.php?page=categoria");
		}
	}

?>