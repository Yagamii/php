<?php
	while(@$row = mysqli_fetch_array($r, MYSQLI_ASSOC)):
?>

<h1 align="center"><?php echo $row['titulo']; ?></h1>
	<div align="center" style="font-size: 12px">
    	Postado em <?php echo $row['data'];?> por <?php echo $row['usuario'];?>
    </div>
    <div class="corponot"><p><?php echo nl2br($row['corpo']);?></p>
    
    <div class="avaliar">
    	<?php switch(@$a){
				case 1:
				?>
					<p align="right"><span style="color:#09F"> Curti </span>| Não curti</p>
                <?php
				break;
				case 2:
				?>
					<p align="right"> Curti | <span style="color: #C00"> Não curti </span></p>
                <?php
				break;
				default:
					if(isset($_SESSION['usuario_id'])){
				?>
                <form action="index.php?page=noticias&action=detalhes&use=avaliar&id=<?php echo $_GET['id'];?>" method="post">
                	<p align="right">
						<input type="radio" name="ava" value="1"> 
							Curti |
						<input type="radio" name="ava" value="2">
							Não curti</p>
						<div align="right" style="padding-right: 60px; padding-top: 5px"><input type="hidden" name="avaliar" value="TRUE" />
				<input type="submit" name="avaliacao" value="Avaliar" /></div>
				
				</form>
                <?php }
				break;
			  }
		?>
    </div> 
    
    </div>
    <div class="comentarios"><br/><h2>Comentários</h2>
    <?php
		$c = $noticias->getComents($_GET['id']);
		while(@$row = mysqli_fetch_array($c, MYSQLI_ASSOC)):
	?>
    <div>
    	<p>
        	<b> 
            	<?php echo $row['usuario'];?>
            </b> em <?php echo $row['data'];?>:<br/>
				<?php echo $row['mensagem'];?>
        </p>
               <?php if(@$_SESSION['nivel_usuario'] > 0){
						echo '<div align="right" style="padding-right: 20px"><a href="index.php?page=noticias&id='.$_GET['id'].'&action=detalhes&use=deletarcomentario&cid='.$row['comentario_id'].'">Deletar</a></div>';
			   }?>
    </div>
    
	<?php
		endwhile;
	?>
    </div>
    
	<?php if(isset($_SESSION['usuario_id'])){?>
		<br/><div style="padding-left: 6px">Logado como: <?php echo $_SESSION['usuario'];?></div>
				<form action="index.php?page=noticias&action=detalhes&use=comentar&id=<?php echo $_GET['id'];?>" method="post"><p>Comentar:</p> <p><textarea name="mensagem" cols="100" rows="7"></textarea></p>
					<p align="center"><input type="hidden" name="comentou" value="TRUE" />
						<input type="submit" name="comentar" value="Comentar" /></p>
				</form>
		<?php }else{?>
				<br/><div style="padding-left: 20px">Para deixar um comentário, faça seu <a href="index.php?page=login">Login</a>. Não tem uma conta ainda? Faça seu <a href="index.php?page=cadastro">cadastro</a>. </div> 
		<?php }?>
        
<?php
		
	endwhile;
?>