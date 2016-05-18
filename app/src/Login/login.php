<?php
	class Login extends Padrao{
		
		public function logar($user, $pass){	
			try{
				
				$_user = $this->verificarCampo($user);
				$_pass = md5($pass);
			
				if(!$_user or !$_pass)
					
					throw new Exception("Por favor, insira todos os dados.");
			
					
				$q = "SELECT * FROM usuarios WHERE usuario='$_user' AND pass='$_pass'";
				$r = $this->Dbc->query($q);
			
				if(mysqli_num_rows($r) <= 0)
					throw new Exception("Usuário não encontrado.");
				
					$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
				
					$_SESSION['usuario_id'] = $row['usuario_id'];
					$_SESSION['usuario'] = $row['usuario'];
					$_SESSION['nivel_usuario'] = $row['nivel_usuario'];
					
					header("Location: index.php");
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		public function logout(){
			$_SESSION = array();
			session_destroy();
			
			header("Location: index.php");
		}
		
	}
?>