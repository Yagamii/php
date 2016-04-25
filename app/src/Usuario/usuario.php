<?php
	class Usuario extends Padrao{
		public $usuario_id;
		
		function getUser(){
			try{
				$q = "SELECT * FROM usuarios WHERE usuario_id='$this->usuario_id'";
				$r = $this->Dbc->query($q);
			
				if(mysqli_num_rows($r) <= 0)
					throw new Exception("Usuario não encontrado.");
				
				return $r;
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function editUser($nome, $sobrenome){
			try{
				$_nome = $this->verificarCampo($nome);
				$_sobrenome = $this->verificarCampo($sobrenome);
				$_image = $this->verificarImagem($_FILES['imguser']['type'], $_FILES['imguser']['name'], $_FILES['imguser']['tmp_name']);
			
				if(!$_nome or !$_sobrenome)
					throw new Exception("Por favor preencha todos os campos.");
				
				if(!$_image){
					$q = "UPDATE usuarios SET nome='$_nome', sobrenome='$_sobrenome' WHERE usuario_id='$this->usuario_id' LIMIT 1";
				}else{
					$q = "UPDATE usuarios SET nome='$_nome', sobrenome='$_sobrenome', user_img='$_image' WHERE usuario_id='$this->usuario_id' LIMIT 1";
				}
				$r = $this->Dbc->query($q);
				
				if(!mysqli_affected_rows($this->Dbc->getConnection()))
					throw new Exception("O usuário não pôde ser atualizado");
				
				ErrorHandler::setSucess("Dados editados com sucesso.");
				
				
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function setId($id){
			$this->usuario_id = $id;
		}
		
	}
?>