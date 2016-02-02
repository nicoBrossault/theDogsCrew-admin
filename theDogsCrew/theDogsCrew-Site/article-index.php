<div class='article-1 row' >
<?php 
	$sql=$db->query("
			SELECT *
			FROM article
			WHERE article.date < DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 15 day) 
			AND article.idLangue=".$_SESSION['langue']." 
			ORDER BY idArticle DESC LIMIT 0,3");
	while ($data = $sql->fetch()):?>
	<div class="col-xs-10 col-md-3 article">
		<div id="texte-article">
			<img src="images/bandeRune.png" class="img-responsive" alt="Responsive image" style="padding-top:10%;">
			<h3><?=utf8_encode($data['Titre'])?></h3>
			<br><?=$data['date']?>
			<br><?=utf8_encode($data['texte'])?>
			<?php 
				if($data['idPage']!=NULL):
					$sqlPage=$db->query("
						SELECT page.idPage, page.Titre
						FROM page
						WHERE page.idPage='".$data['idPage']."'");
					while ($dataPage = $sqlPage->fetch()):?>
			<br>La page : <a href="page.php?id=<?=$dataPage['idPage']?>"><?=$dataPage['Titre']?></a>
			<?php endwhile; endif;?>
			<img src="images/bandeRune.png" class="img-responsive" alt="Responsive image" style="padding-top:10%;">
		</div>
	</div>
<?php endwhile; ?>
</div>