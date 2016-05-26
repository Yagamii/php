<?php
	class Padrao{
		public $Dbc;
		
		public function __construct(){
			$Connect = new Connect;
			$this->Dbc = $Connect->connectToDb();
		}
		
		public function verificarCampo($dado){
			$_dado = mysqli_real_escape_string($this->Dbc->getConnection(), $dado);
			
			return $_dado;
		}
		
		public function verificarImagem($imagem, $name, $tpmname){
			$permitido = array('image/jpeg', 'image/jpg', 'image/JPG', 'image/png', 'imagem/PNG');
			
				if(in_array($imagem, $permitido)){					
				
					if(move_uploaded_file($tpmname, "../app/template/includes/uploads/thumbnail/".$name."")){
						$_image = $name;
						
						return $_image;
					}
				}else{
				return false;
				}
		}
	}
?>