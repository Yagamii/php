<?php
	$r = $Noticias->getNews();
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		
			$coment_num = $Noticias->getNumComents($row['noticia_id']);
			$resumoCorpo = $Noticias->resumoCorpo($row['corpo']);
			
			
			echo '<h2><a href="ver_noticia.php?nid='.$row['noticia_id'].'">'.$row['titulo'].'</a></h2>';
			echo '<br/><div align="center"><a href="ver_noticia.php?nid='.$row['noticia_id'].'"><img src="/php/includes/uploads/thumbnail/'.$row['thumbnail'].'" height="360" width="710" alt="'.$row['titulo'].'" /></a></div>';
			echo '<p align="justify" style="margin-top: -10px">'.$resumoCorpo.'</p>';
			echo '  <div class="lermais"><span style="color: grey; font-style: italic">'.$coment_num[0].' comentário(s)</span><a href="ver_noticia.php?nid='.$row['noticia_id'].'"><div>Ler mais.</div></a></div>';
	}

?>