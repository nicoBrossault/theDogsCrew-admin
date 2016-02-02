<?php
	//session_start();
	//connexion à la bdd à écrire ici où l'inclure comme ci-dessous
	include('coBDD.php');

	function galerie($db){
		//requete de selection des images
		$afficheImage=$db->query('SELECT * FROM image');
		$numImage=0;

		//Tant que "retourne champs dans image (requete)" stocker dans data
		while($data=$afficheImage->fetch()){
			//stocker url image dans la variable image
			$image=$data['URL'];
			//afficher sur le navigateur les images (en classe responsive avec Bootstrap)
			echo('<div class="image-galerie" id="'.$numImage.'" style="border:solid 10px white;background-color:white"><img src='.$image.' class="img-responsive center-block" alt="Responsive image"></div>');
			//compte des images
			$numImage+=1;
		}
	}
	function galerieThumbnail($db){
		//requete de selection des images
		$afficheImage=$db->query('SELECT * FROM image');
		$numImage=0;

		//Tant que "retourne champs dans image (requete)" stocker dans data
		while($data=$afficheImage->fetch()){
			//stocker url image dans la variable image
			$image=$data['URL'];
			//afficher sur le navigateur les images (en classe responsive avec Bootstrap)
			echo('	<div class="imgThumbnail" id="'.$numImage.'" style="float:left; margin:2%; width:80px;">
						<img src='.$image.' class="img-responsive img-thum" id="'.$numImage.'" alt="Responsive image" style="max-height:50px;">
					</div>');

			//compte des images
			$numImage+=1;
		}
	}
?>