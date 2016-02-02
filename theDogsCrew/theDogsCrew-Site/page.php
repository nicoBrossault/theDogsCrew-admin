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
	<?php
		$page=$db->query('SELECT * FROM page WHERE idPage='.intval($_GET['id']) .' AND idLAngue='.$_SESSION['langue']);
		while ($data = $page->fetch()):
			if($data['image']!=NULL):?>
			<div class="page center-block row">
				<div id="texte-article">
					<h3 style="padding-top:2%; padding-left:6%">
						<?=utf8_encode($data['titre'])?>
					</h3>
					<div class="col-md-6 col-xs12">
						<img src="<?=$data['image']?>" 
							class="img-responsive center-block" 
							alt="Responsive image" 
							style="width:80%; margin-top:10%;">
					</div>
					<div class="col-md-6 col-xs12">
						<br><?=utf8_encode($data['texte'])?>
						<br><b><?=$data['date']?></b>
					</div>
 				</div>
			</div>');
		<?php else: ?>
			<div class="page center-block row">
				<div id="texte-article">
					<h3 style="padding-top:2%">
						<?=utf8_encode($data['titre'])?>
					</h3>
					<br><?=$data['date']?>
					<br><?=utf8_encode($data['texte'])?>
				</div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>

    <?php 
      include('footer.php');
    ?>
  </body>
</html>