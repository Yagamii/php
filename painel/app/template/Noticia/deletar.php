<?php while($row = mysqli_fetch_array($noticiaPorId, MYSQLI_ASSOC)): ?>
<p align="center">Você tem certeza que deseja apagar a noticia abaixo?</p>
	<p align="center"><b><?php echo $row['titulo']; ?></b></p>';
	<form action="index.php?page=noticia&action=deletar&id=<?php echo $row['noticia_id'];?>" name="apagar" method="post"><p align="center">
		<input type="hidden" name="deletarnoticia" value="TRUE" />
		<input type="submit" name="deletar" value="Deletar!" />
	</form>
    </p>
<?php endwhile; ?>