<?php while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)): ?>

	<h1 align="center">Deletar usuário</h1><br/>
		<p align="center">Você tem certeza que deseja excluir o usuário: <b><?php echo $row['usuario']; ?></b>?
		<form action="index.php?page=usuario&action=deletar&id=<?php echo $_GET['id'];?>" name="deluser" method="post">
        <p align="center"><input type="hidden" name="delusuario" value="TRUE" />
		<input type="submit" name="delusu" value="Apagar" />
        </p>
        </form>

<?php endwhile; ?>