<h1 align="center">Adicionar notícia</h1>

		<div align="center"><form enctype="multipart/form-data" name="addMateria" action="index.php?page=noticia&action=adicionar" method="post">
			<table border="0" width="100%">
    	<tr>
        	<td><p>Título:</p></td>
        	<td><p align="left"><input  type="text" name="titulo" size="65" /></p></td>
        </tr>
        <tr>
        	<td valign="top"><p >Texto:</p></td>
            <td><p align="left"><textarea name="corpo" cols="67" rows="9"></textarea></p></td>
        </tr>
		<tr>
			<td><p>Thumbnail:</p></td>
			<td><p align="left"><input type="file" name="thumb" /></p></td>
		</tr>
        <tr>
        	<td><p>Categoria:</p></td>
            <td><p align="left"><select name="categoria">
            	<?php $cat = $Noticia->getCategorias();
					while($row = mysqli_fetch_array($cat, MYSQLI_ASSOC)){
							echo '<option value="'.$row['categoria_id'].'">'.$row['categoria'].'</option>';
						}?>
            </select>
            </p></td>
        </tr>
		<tr>
			<td colspan="2">
            	<p align="center"><input type="hidden" name="adicionar" value="TRUE">
						<input type="submit" name="botaoadicionar" value="Adicionar"></p>
			</td>
        </tr>
    </table>
</form>
</div>