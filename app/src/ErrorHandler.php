<?php

	class ErrorHandler{
		static $error = [];
		
		public static function getError(){
			return self::$error;
		}
		
		public static function setError($erro){
			self::$error[] = $erro;
		}
	}

?>