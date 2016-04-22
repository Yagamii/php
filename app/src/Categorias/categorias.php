<?php
	class Categorias extends Padrao{
		
		function getCategorias(){
			$q = "SELECT * FROM categorias ORDER BY categoria ASC";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
		
		function verCategoria($id){
			$_id = $id;
			$q = "SELECT * FROM noticias INNER JOIN categorias ON noticias.categoria_id=categorias.categoria_id WHERE noticias.categoria_id = '$_id' ORDER BY noticias.data_noticia DESC";
			$r = $this->Dbc->query($q);
			
			return $r;
		}
	}
?>