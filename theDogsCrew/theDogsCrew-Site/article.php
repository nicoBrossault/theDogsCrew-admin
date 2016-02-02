<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dogs' Crew</title>
    <link rel="stylesheet" href="css/general.css">
    <!-- Bootstrap -->
      <link href="dist/css/bootstrap.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript" src="dossierJS/jquery-1.11.3.min.js"></script>
  </head>
  <body> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <div class="contient-navbar">
      <?php
        include('navbar.php');
	     ?>
    </div>  
    <div class='article-1 row' >
    <?php 
		$sql=$db->query("SELECT * FROM article WHERE date < DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 15 day) AND `idLangue`=".$_SESSION['langue']." ORDER BY idArticle DESC");
		while ($data = $sql->fetch()):
	?>
		<div class="col-xs-10 col-md-10 article">
			<div id="texte-article">
 				<h3><?=utf8_encode($data['Titre'])?></h3>
				<br><?=utf8_encode($data['date'])?>
 				<br><br><?=utf8_encode($data['texte'])?>
 				<?php 
				if($data['idPage']!=NULL):
					$sqlPage=$db->query("
						SELECT page.idPage, page.Titre
						FROM page
						WHERE page.idPage='".$data['idPage']."'");
					while ($dataPage = $sqlPage->fetch()):?>
					<br>La page : <a href="page.php?id=<?=$dataPage['idPage']?>"><?=$dataPage['Titre']?></a>
				<?php endwhile; endif;?>
			</div>
		</div>
    <?php endwhile; ?>
    </div>
    <?php include('footer.php');?>
  </body>
</html>