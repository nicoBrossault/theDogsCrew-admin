<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dogs' Crew</title>
	    
		<!--css du site en général-->
		<link rel="stylesheet" href="css/general.css">
	    
		<!--css de la galerie en général-->
		<link rel="stylesheet" href="css/galerie.css">
	    
		<!-- Bootstrap -->
		<link href="dist/css/bootstrap.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- script des fonction js (en jquery) de la galerie-->
		<script src="script/script-galerie.js"></script>
	</head>
	<body>
		<script src="dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="dossierJS/jquery-1.9.0.min.js"></script>
		<?php 
			include('navbar.php');
			//Inclus les fonctions de galerie pour l'affichage et 
			//la gestion de la taille des image (Thumbnail inclus)
			include('php/fonction-galerie.php');
		?>
		<div class="container-fluid galerie">
			<div class="col-xs-12 col-md-8">

			<!-- Contient le bouton précédent ainsi que la description des images -->    
			<div class="col-xs-12 col-md-1 container">
				<div id="bouton-prec">
					<!-- Bouton précédent -->
						<div class="glyphicon glyphicon-circle-arrow-left prec"></div>
						</div>
				</div>
				
				<!-- Contient les images -->
				<div class="col-xs-12 col-md-9">
					<!-- recupération de l'affichage de toutes les images -->
					<!-- L'affichage image par image--> 
					<?php galerie($db); ?>
				</div>
				    	
				<!-- Contient le bouton suivant -->
				<div class="col-xs-12 col-md-1" id="image_droite">
					<!-- Bouton suivant -->
					<div id="bouton-suiv">
						<div class="glyphicon glyphicon-circle-arrow-right suiv"></div>
					</div>
				</div>
			</div>

			<!-- Contient la navigation des images -->
			<div class="col-xs-12 col-md-4 galerie-imgThumbnail" style="overflow-y:scroll;">
				<div class="center-block">
					<!-- recupération de l'affichage de toutes les images -->
					<!-- L'affichage image par image-->
					<?php galerieThumbnail($db); ?>
				</div>
			</div>
		</div>
		<?php
			include('footer.php');
		?>
	</body>
<html>