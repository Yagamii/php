<h1 align="center">Deletar categoria</h1>
	<?php $row = mysqli_fetch_array($cat, MYSQLI_ASSOC); ?>
	<p align="center"> Você tem certeza que deseja excluir a categoria: <b><?php echo $row['categoria'];?></b>?</p>	
	<br/><div align="center">
    <form name="delcat" action="index.php?page=categoria&action=deletar&id=<?php echo $_GET['id']; ?>" method="post">
				  <input type="hidden" name="deletar" value="TRUE" />
				  <input type="submit" name="delecat" value="Excluir" />
          </div>
     </form>