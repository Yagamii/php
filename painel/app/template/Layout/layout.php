<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo ucfirst(Fuseaction);?></title>
	<link rel="stylesheet" href="app/template/Layout/style.css" type="text/css" media="screen" />
</head>

<body>

<div id="geral">
<?php if(isset($_SESSION['usuario_id'])){ ?>
<div id="header">
	<h1 align="center">Painel Admin</h1><br />
</div>
<div id="sidebar">
	<ul type="disc">
    	<li>Usuários</li>
    	<ul><li><a href="index.php?page=usuario">Editar usuario</a></li></ul>
        <li>Categoria</li>
        <ul><li><a href="index.php?page=categoria&action=adicionar">Adicionar categoria</a></li></ul>
        <ul><li><a href="index.php?page=categoria">Editar categorias</a></li></ul>
        <li>Conteúdo</li>
        <ul><li><a href="index.php?page=noticia&action=adicionar">Escrever notícia</a></li></ul>
        <ul><li><a href="index.php?page=noticia">Editar notícia</a></li></ul>
        <li><b><a href="index.php?page=login&action=logout">Logout</a></b></li>
    	</ul>
</div>
<div id="content">


			<?php 
				
				if(ErrorHandler::getError()){
					foreach(ErrorHandler::getError() as $erro){
						echo '<p class="error" align="center">'.$erro.'</p>';
					}
				}elseif(ErrorHandler::getSucess()){
					foreach(ErrorHandler::getSucess() as $sucess){
						echo '<p class="sucess">'.$sucess.'</p>';
					}
				}
				
				require_once("app/template/".ucfirst(Fuseaction)."/".strtolower(Fuseaction).".php");
				
    		?>
</div>
</div>
<?php }else{ 
	if(!isset($_GET['logado'])){
	ErrorHandler::verificarUsuario($_SESSION['usuario_id']);
	}
	require_once("app/template/".ucfirst(Fuseaction)."/".strtolower(Fuseaction).".php");?>
	
<?php }?>
</body>
</html>