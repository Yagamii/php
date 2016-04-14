<?php
	
	class Noticias extends Padrao{
		
		public function getNews(){
			
			$q = "SELECT * FROM noticias ORDER BY data_noticia DESC";
			$r = $this->Dbc->query($q);
			
			if(mysqli_num_rows($r) > 0){
				return $r;
			}else{
				echo "<p>Não foi encontrado nenhuma notícia. :( </p>";
			}
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