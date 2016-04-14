<?php
	require("app/config/connect.php");
	require("app/src/default.php");
	
	
	define("Fuseaction", $_REQUEST['page']);
	@define("action", $_REQUEST['action']);
	
	if(!Fuseaction){
		header("Location: index.php?page=noticias");
	}
	
	require_once("app/src/ErrorHandler.php");
	
	session_start();
	
	require_once("app/src/".ucfirst(Fuseaction)."/".strtolower(Fuseaction).".php");
	require_once("app/src/".ucfirst(Fuseaction)."/act_".strtolower(Fuseaction).".php");
	
	require_once("app/template/layout/layout.php");
	

	
?>