<?php
	
	class Padrao{
		public $Dbc;
		
		public function __construct(){
			$Connect = new Connect;
			$this->Dbc = $Connect->connectToDb();
		}
		
		public function getNumComents($nid){
				$noid = $nid;
				$g = "SELECT COUNT(comentario_id) FROM comentarios WHERE noticia_id='$noid'";
				$c = $this->Dbc->query($g);
				
				$coment_num = mysqli_fetch_array($c, MYSQLI_NUM);
				
				return $coment_num;
		}
		
		public function resumoCorpo($corpo){
			$resumoCorpo = substr($corpo, 0, strrpos(substr($corpo, 0, 480), ' ')) . '...';
			
			return $resumoCorpo;
		}
		
		public function verificarCampo($dado){
			$_dado = mysqli_real_escape_string($this->Dbc->getConnection(), $dado);
			
			return $_dado;
		}
		
		public function verificarImagem($imagem, $name, $tpmname){
			$permitido = array('image/jpeg', 'image/jpg', 'image/JPG', 'image/png', 'imagem/PNG');
			
				if(in_array($imagem, $permitido)){					
				
					if(move_uploaded_file($tpmname, "app/template/includes/uploads/user/".$name."")){
						$_image = $name;
						
						return $_image;
					}
				}else{
				return false;
				}
		}
	}
	
?>