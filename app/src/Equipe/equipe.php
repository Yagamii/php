<?php
	class Equipe extends Padrao{
		
		function getEquipe(){
			try{
			$q = "SELECT * FROM usuarios WHERE nivel_usuario > 0";
			$r = $this->Dbc->query($q);
			
			if(mysqli_num_rows($r) == 0)
				throw new Exception("Não foi possivel carregar membros da equipe.");
			
				return $r;
			
			}catch(Exception $e){
				ErrorHandler::setError($e->getMessage());
			}
		}
		
		function getCargo($id){
			$_id = $id;
			if($_id == 1){
				echo 'Moderador</p>';
			}else{
				echo 'Administrador</p>';
			}
		}
		
	}
?>