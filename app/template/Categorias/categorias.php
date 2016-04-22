<?php if(!id){?>
<h1 align="center">Categorias</h1>
<p align="center">
<?php while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)): ?>

	- <a href="index.php?page=categorias&id=<?php echo $row['categoria_id']; ?>"> <?php echo $row['categoria']; ?> </a><br/>

<?php endwhile; ?>
</p>
<?php }else{ 
		while($row = mysqli_fetch_array($c, MYSQLI_ASSOC)):
			$coment_num = $categorias->getNumComents($row['noticia_id']);
			$resumoCorpo = $categorias->resumoCorpo($row['corpo']);
?>
	<h1 align="center"><a href="index.php?page=categorias"><?php echo $row['categoria']; ?></a></h1>
    
    <h2><a href="ver_noticia.php?id=<?php echo $row['noticia_id']; ?>"><?php echo $row['titulo']; ?></a></h2><br/>
		
        <div align="center">
        	<a href="ver_noticia.php?nid=<?php echo $row['noticia_id']; ?>">
        		<img src="/php/includes/uploads/thumbnail/<?php echo $row['thumbnail']; ?>" height="360" width="710" alt="<?php echo $row['titulo']; ?>" /></a>
        </div>
			<p align="justify" style="margin-top: -10px"><?php echo $resumoCorpo; ?></p>
			<div class="lermais">
                    <span style="color: grey; font-style: italic">
						<?php echo $coment_num[0]; ?> comentário(s)
                    </span>
                        <a href="ver_noticia.php?nid=<?php echo $row['noticia_id']; ?>">
                    <div>Ler mais.</div>
                    	</a>
            </div>
<?php endwhile;}?>