<h1 align="center">Editar dados</h1>
	
<?php 
while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)):
?>    
    <div align="center"><form enctype="multipart/form-data" name="editar" action="index.php?page=usuario&id=<?php echo $usuario->usuario_id;?>&action=editar" method="POST">
		<table border="0">
			<tr>
	   			<td><p>Usuário:</p></td>
 		    	<td><p><input disabled type="text" name="usuario" value="<?php echo $row['usuario'];?>" /></p></td>
   		  	</tr>
   			<tr>
				<td><p>Nome:</p></td>
    			<td><p><input type="text" name="nome" value="<?php echo $row['nome'];?>" /></p></td>
   			</tr>
   			<tr>
    			<td><p>Sobrenome:</p></td> 
     			<td><p><input type="text" name="sobrenome" value="<?php echo $row['sobrenome'];?>" /></p></td>
   			</tr> 
    		<tr>
    			<td><p>Email:</p></td>
      			<td><p><input disabled type="text" name="email" value="<?php echo $row['email'];?>" /></p></td>
   			</tr>
			<tr>
				<td colspan="2"><p><img src="app/template/includes/uploads/user/<?php echo $row['user_img'];?>" width="200" height="200"/></p></td>
			</tr>
			<tr>
				<td><p>Imagem:</p></td>
				<td><p align="left"><input type="file" name="imguser" /></p></td>
			</tr>
			<tr>
			<td colspan="2"><p align="center"> 
        		<input type="hidden" name="enviado" value="TRUE" />
        		<input type="submit" value="Atualizar" name="att" />
				<input type="hidden" name="uid" value="'.$uid.'"/>
      		</p></td></tr>
		</table>
	</div>
    
<?php
endwhile;
?>