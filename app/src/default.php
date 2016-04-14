<?php
	
	class Padrao{
		public $Dbc;
		
		public function __construct(){
			$Connect = new Connect;
			$this->Dbc = $Connect->connectToDb();
		}
		
	}
	
?>