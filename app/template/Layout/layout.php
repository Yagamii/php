<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo ucfirst(Fuseaction);?></title>
	<link rel="stylesheet" href="app/template/Layout/style.css" type="text/css" media="screen" />
</head>

<body>
	<div id="header">
		<h1>Player One</h1>
		<h2>Apenas para jogadores</h2>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="index.php">Inicio</a></li>
			<li><a href="index.php?page=equipe">Equipe</a></li>
            <li><a href="index.php?page=categorias">Categorias</a></li>
			<li><a href="index.php?page=cadastro">Cadastro</a></li>
			<li><?php if(isset($_SESSION['usuario_id'])){
						if($_SESSION['nivel_usuario'] == 2){
							echo '<a href="/php/painel/admin.php">Admin</a>';
						}else{
            			echo '<div class="dropdown"><a href="#"><div class="dropbtn">'.$_SESSION['usuario'].'</div></a>
								<div class="dropdown-content">
									<a href="index.php?page=usuario&id='.$_SESSION['usuario_id'].'">Editar dados</a>
									<a href="index.php?page=login&action=logout">Logout</a>
								</div>
								</div>';}
						}else{ 
						echo '<a href="index.php?page=login">Login</a>';
						}
                        ?></li>
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
    <div id="footer">
    </div>
</body>
</html>