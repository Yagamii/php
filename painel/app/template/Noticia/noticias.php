<div align="center">
	<table cellspacing="1" cellpadding="5" width="100%">
		<tr>
			<th>Titulo</th>
			<th>Categoria</th>
			<th>Autor</th>
			<th>Publicado em</th>
			<th>Editar</th>
			<th>Apagar</th>
		</tr>
    <?php $bg = '#E3E3E6'; 
		  while($row = mysqli_fetch_array($noticias, MYSQLI_ASSOC)):
		  $bg = ($bg=='#E3E3E6' ? '#ffffff' : '#E3E3E6');?>
        <tr bgcolor="<?php echo $bg;?>">
        	<td><?php echo $row['titulo']; ?></td>
			<td><?php echo $row['categoria'];?></td>
			<td><?php echo $row['usuario'];?></td>
			<td><?php echo $row['data'];?></td>
			<td><a href="index.php?page=noticia&action=editar&id=<?php echo $row['noticia_id'];?>">Editar</a></td>
			<td><a href="index.php?page=noticia&action=deletar&id=<?php echo $row['noticia_id'];?>">Apagar</a></td>
        </tr>
     <?php endwhile;?>
    </table>
</div>