	<h1 align="center">Equipe</h1>
<?php
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)):
?>
	<div id="equipe">
    	<img src="app/template/includes/uploads/user/<?php echo $row['user_img'];?>" />
    	<p>Nome: <?php echo $row['nome']. ' '; echo $row['sobrenome']; ?></p>
        <p>Apelido: <?php echo $row['usuario']; ?></p>
        <p>E-mail: <?php echo $row['email']; ?></p>
        <p>Cargo: <?php $equipe->getCargo($row['nivel_usuario']); ?></p>
	</div>
<?php
	endwhile;
?>