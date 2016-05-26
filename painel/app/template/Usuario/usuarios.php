<h1 align="center">Lista de usuários</h1>
	<table align="center" cellspacing="2" cellpadding="5" width="100%">
		<tr>
			<td align="left"><b>Usuário</b></td>
			<td align="left"><b>Nome</b></td>
			<td align="left"><b>Email</b></td>
			<td align="left"><b>Cargo</b></td>
			<td align="left"><b>Editar</b></td>
			<td align="left"><b>Excluir</b></td>
		</tr>
    <?php
    $bg = '#eeeeee';
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)):
		
		$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		$cargo = $usuario->getNivel($row['nivel_usuario']);
		?>
		
		
		<tr bgcolor="<?php echo $bg;?>">
			<td align="left"><?php echo $row['usuario'];?></td>
			<td align="left"><?php echo $row['nome'].' '.$row['sobrenome'];?></td>
			<td align="left"><?php echo $row['email'];?></td>
			<td align="left"><?php echo $cargo; ?></td>
			<td align="left"><a href="index.php?page=usuario&action=editar&id=<?php echo $row['usuario_id'];?>">Editar</a></td>
			<td align="left"><a href="index.php?page=usuario&action=deletar&id=<?php echo $row['usuario_id'];?>">Excluir</a></td>
		</tr>
	
	<?php endwhile;?>
	</table>
   