<h1 align="center">Editar usuário</h1>
<?php while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)): ?>
			<div align="center"><form name="editar" action="index.php?page=usuario&action=editar&id=<?php echo $_GET['id'];?>" method="POST">
				<table border="0">
				 <tr>
    				<td><p>Usuário:</p></td>
     			   <td><p><input type="text" disabled name="usuario" value="<?php echo $row['usuario']; ?>" /></p></td>
   				 </tr>
   				 <tr>
					<td><p>Nome:</p></td>
    				<td><p><input type="text" name="nome" value="<?php echo $row['nome']; ?>" /></p></td>
   				 </tr>
   				 <tr>
    				<td><p>Sobrenome:</p></td> 
     			   <td><p><input type="text" name="sobrenome" value="<?php echo $row['sobrenome']; ?>" /></p></td>
   				 </tr>
 			     
    			<tr>
    				<td><p>Email:</p></td>
      			    <td><p><input type="text" disabled name="email" value="<?php echo $row['email']; ?>" /></p></td>
   				</tr>
				<tr>
					<td><p>Nivel do usuário:</p></td>
					<td><p><select name="nivel" width="50">';
							<option value="0"> </option>
				<?php
				$usuario->getNiveis();
				?>		
				</select></p></td>
				</tr>
				<td colspan="2"><p align="center"> 
        			<input type="hidden" name="atualizar" value="TRUE" />
        			<input type="submit" value="Atualizar" name="att" />
					<input type="hidden" name="uid" value="<?php echo $uid;?>"/>
      			 </p></td>
				</table>
			</div>
<?php endwhile; ?>