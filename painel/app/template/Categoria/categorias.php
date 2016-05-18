<h1 align="center">Categorias</h1>
<br/>
<div align="center">
	<table cellspacing="1" cellpadding="2" width="60%">
		<tr>
			<th><b>Nome:</b></th>
			<th><b>Editar</b></th>
			<th><b>Excluir</b></th>
		</tr>
    
    	<?php while($row = mysqli_fetch_array($categorias, MYSQLI_ASSOC)): ?>
		<tr>
			<td><?php echo $row['categoria']; ?></td>
			<td><a href="index.php?page=categoria&action=editar&id=<?php echo $row['categoria_id']; ?>">Editar</a></td>
			<td><a href="index.php?page=categoria&action=deletar&id=<?php echo $row['categoria_id']; ?>">Excluir</a></td>
		</tr>
     
     	<?php endwhile; ?>
	 </table>
 </div>