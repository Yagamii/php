<h1 align="center">Editar categoria</h1>
	<?php $row = mysqli_fetch_array($cat, MYSQLI_ASSOC); ?>
	<br/><div align="center">
    <form action="index.php?page=categoria&action=editar&id=<?php echo $_GET['id']; ?>" name="editcat" method="post">
		<table border="0">
			<tr>
				<td><p>Nome:</p></td>
				<td><p><input type="text" name="categoria" value="<?php echo $row['categoria']; ?>" /></p></td>
			</tr>
			<tr >
				<td colspan="2"><p align="center">
                	<input type="hidden" name="editar" value="TRUE" />
					<input type="submit" name="edit" value="Alterar" /></p>
				</td>
			</tr>
		</table>
        </div>
	</form>