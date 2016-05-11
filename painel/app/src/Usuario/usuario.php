<?php
	class Usuario extends Padrao{
		function getUsuarios(){
			try{
				$q = "SELECT * FROM usuarios ORDER BY nome ASC";
				$r = $this->Dbc->query($q);
				
				if(mysqli_num_rows($r) < 1)
					throw new Exception("Não foi encontrado nenhum usuário.");
				
				return $r;
			
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function getUsuario($id){
			$q = "SELECT * FROM usuarios WHERE usuario_id='$id'";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		
		function getNiveis(){
			$q = "SELECT * FROM nivel_usuario";
			$r = $this->Dbc->query($q);
				
			while($nivel_row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
				echo '<option value="'.$nivel_row['nivel_usuario'].'" >'.$nivel_row['nome_nivel'].'</option>';
			}
		}
		
		function getNivel($nivel){
			if($nivel == 1){
			$cargo = 'Moderador';
		}elseif($nivel == 2){
			$cargo = 'Administrador';
		}else{
			$cargo = 'Leitor';
		}
		
			return $cargo;
		
		}
		
		function atualizarUsuario($id, $nome, $sobrenome, $nivel){
			try{
				$_nome = $this->verificarCampo($nome);
				$_sobrenome = $this->verificarCampo($sobrenome);
				
				if(!$_nome && !$_sobrenome && !$nivel)
					throw new Exception("Preencha todos os campos corretamente.");
				
				$q = "UPDATE usuarios SET nome='$_nome', sobrenome='$_sobrenome', nivel_usuario='$nivel' WHERE usuario_id='$id' LIMIT 1";
				$r = $this->Dbc->query($q);
				
				
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
			
		}
		
		function deletarUsuario($id){
			$q = "DELETE FROM usuarios WHERE usuario_id = '$id'";
			$r = $this->Dbc->query($q);
		}
		
	}
?>