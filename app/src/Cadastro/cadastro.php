<?php
	class Cadastro extends Padrao{
		
		function cadastrar($nome, $snome, $usuario, $email, $senha, $csenha){
			try{
				
				if(!$nome or !$snome or !$usuario or !$email or !$senha or !$csenha)
					throw new Exception ("Por favor, insira todos os dados.");
				
				if($senha != $csenha)
					throw new Exception ("Sua senha está diferente da confirmação de senha.");
				
				$_nome = $this->verificarCampo($nome);
				$_snome = $this->verificarCampo($snome);
				$_usuario = $this->verificarCampo($usuario);
				$_email = $this->verificarCampo($email);
				$_senha = md5($senha);
				
				$q = "INSERT INTO usuarios (nome, sobrenome, usuario, pass, email, data_registro) VALUES ('$_nome', '$_snome', '$_usuario', '$_senha', '$_email', NOW())";
				$r = $this->Dbc->query($q);
				
				if(mysqli_affected_rows($this->Dbc->getConnection()) <= 0)
				
					throw new Exception("Não foi possivel efetuar o cadastro.");
				
				$sucess = "Cadastro feito com sucesso.";
				ErrorHandler::setSucess($sucess);
				
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
	}
?>