<h1 align="center">Editar notícia</h1>
	<?php $row = mysqli_fetch_array($noticiaPorId, MYSQLI_ASSOC); ?>
	<div align="center">
    <table>
    <form enctype="multipart/form-data" action="index.php?page=noticia&action=editar&id=<?php echo $row['noticia_id'];?>" name="editar" method="post">
		<tr>
			<td><p>Titulo: </p></td> <td><p> <input type="text" size="60px" name="titulo" value="<?php echo htmlentities($row['titulo'], ENT_QUOTES);?>" /></p></td>
		</tr>
		<tr>
			<td valign="top"><p>Corpo: </td> <td><p> <textarea name="corpo" cols="62" rows="12"><?php echo $row['corpo']; ?></textarea></p></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><img align="center" src="../app/template/includes/uploads/thumbnail/<?php echo $row['thumbnail'];?>" height="230" width="330" /></td>
		</tr>
		<tr>
			<td><p>Thumb:</p></td> <td><p align="left"><input type="file" name="thumb" /></p></td>
		</tr>
		<tr>
			<td> <p>Categoria:</p> </td> <td ><p align="left"><select name="categoria">
            
            <?php $cat = $Noticia->getCategorias();
				while($catrow = mysqli_fetch_array($cat, MYSQLI_ASSOC)){
					if($catrow['categoria_id'] === $row['categoria_id']){
						echo '<option selected value="'.$catrow['categoria_id'].'">'.$catrow['categoria'].'</option>';
						}else{
						echo '<option value="'.$catrow['categoria_id'].'">'.$catrow['categoria'].'</option>';
						}
					}?>
            
            </p></select></td>
		<tr>
			<td><p>Autor: </p></td><td><p align="left"><input type="text" disabled value="<?php echo $row['usuario'];?>" /></p></td>
		</tr>
		<tr>
			<td colspan="2"><p align="center"><input type="hidden" name="editar" value="TRUE" />
			<input type="submit" name="editando" value="Editar" /></p></td>
		</tr>
						
	</form>
    </table>
</div>