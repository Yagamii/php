<?php
	class Connect{
	
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db = "phpgames";
		private $connection;
		private $message_error = "Erro ao efetuar conexão com o bando de dados, entre em contato com o administrador do sistema.";
		
		protected function getHost(){ return $this->host;}
		protected function getUser(){ return $this->user;}
		protected function getPass(){ return $this->pass;}
		public function getDb(){ return $this->db;}
		protected function getErro(){ return $this->message_error;}
		
		public function connectToDb(){
			$this->connection = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getDb());
			return $this;
		}
		
		function query($query) {
 				
			return mysqli_query($this->connection, $query);
		}
		
		function getConnection(){
			return $this->connection;
		}
	}
?>