    <h1 align="center">Ultimas notícias</h1>
<?php
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)):
			$coment_num = $noticias->getNumComents($row['noticia_id']);
			$resumoCorpo = $noticias->resumoCorpo($row['corpo']);
?>		
			
	<h2><a href="index.php?page=noticias&action=detalhes&id=<?php echo $row['noticia_id']; ?>"><?php echo $row['titulo']; ?></a></h2><br/>
		
        <div align="center">
        	<a href="index.php?page=noticias&action=detalhes&id=<?php echo $row['noticia_id']; ?>">
        		<img src="app/template/includes/uploads/thumbnail/<?php echo $row['thumbnail']; ?>" height="360" width="710" alt="<?php echo $row['titulo']; ?>" />
            </a>
        </div>
		<p align="justify" style="margin-top: -10px"><?php echo $resumoCorpo; ?></p>
		<div class="lermais">
        	<span style="color: grey; font-style: italic">
				<?php echo $coment_num[0]; ?> comentário(s)
            </span>
                <a href="index.php?page=noticias&action=detalhes&id=<?php echo $row['noticia_id']; ?>">
                <div>Ler mais.</div>
                </a>
        </div>
<?php
	endwhile;
?>