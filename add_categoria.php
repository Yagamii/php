<?php
	include('header.php');
	
	if(isset($_POST['enviado'])){
		$erros = array();
		
		if(empty($_POST['categoria'])){
			$erros[] = "Você não inseriu um nome de categoria.";
		}else{
			$cat = $_POST['categoria'];
		}
		
		if(empty($erros)){
			include_once ('../mysqli_phpconnect.php');
			
			$q = "INSERT INTO categorias (nome) VALUES ('$cat')";
			$r = mysqli_query($dbc, $q);
			
			if(mysqli_affected_rows($dbc) == 1){
				echo '<p class="sucess">Você cadastrou a categoria com sucesso.</p>';
			}else{
				echo '<p class="error">Não foi possivel adicionar a categoria devido a um erro do sistema.</p>';
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
			}
		}
	}
	
?>

<h1 align="center">Adicionar categoria</h1>
	<div align="center">
    	<form action="add_categoria.php" name="add_categoria" method="post">
        <br />
    	<table border="0">
        	<tr>
            	<td>Nome:</td>
           		<td><input type="text" name="categoria" /></td>
            </tr>
            <tr>
            	<td align="center" colspan="2"><p align="center">
                	<input type="hidden" name="enviado" value="TRUE" />
                    <input type="submit" name="adicionar" value="Adicionar" /></p>
        </table>
        </form>
    </div>

<?php
	include('footer.php');
?>