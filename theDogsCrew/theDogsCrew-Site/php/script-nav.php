<?php
include('php/coBDD.php');

if(!isset($_SESSION['langue'])){
	$_SESSION['langue']=1;
}

if(isset($_POST['langue'])){
	$_SESSION['langue']=$_POST['langue'];
}

$sql=$db->query("SELECT textsite.libelle
					FROM textsite
					WHERE idLangue=".$_SESSION['langue']."
					AND type='message_accueil'");
while ($data = $sql->fetch()){
	$accueilNav=$data['libelle'];
}

$sql=$db->query("SELECT * FROM languenavbar WHERE idLangue=".$_SESSION['langue']);
while ($data = $sql->fetch()){
	$texte=$data['texte'];
}
$tabTexte=explode("-", $texte);
$plus=$tabTexte[0];
$accueil=$tabTexte[1];
$compagnie=$tabTexte[2];
$article=$tabTexte[3];
$galerie=$tabTexte[4];
$contact=$tabTexte[5];