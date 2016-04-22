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
	}
	
?>