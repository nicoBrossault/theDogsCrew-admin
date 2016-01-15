<?php
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin <?=$titre?></title>
		<meta charset="UTF-8">
		<!--Import Google Icon Font-->
      	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	</head>
	<body>
		<nav class="teal darken-1" style="margin-bottom: 5%;">
			<span class="brand-logo right" style="margin-right:33%;"><?=$titre?></span>
  			<ul id="slide-out" class="side-nav fixed">
  				<div class="card" style="margin-top:-30px;">
					<div class="card-image">
						<img src="<?=base_url()?>assets/images/epee.jpg">
					</div>
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4">The Dogs' Crew
							<i class="material-icons right">more_vert</i>
						</span>
					</div>
					<div class="card-reveal" style="color:black">
						<span class="card-title grey-text text-darken-4">The Dogs' Crew
							<i class="material-icons right" style="margin-top:8px;">close</i>
						</span>
						<a href="#">user</a>
						<a href="<?=base_url()?>">Home</a>
					</div>
				</div>
				<li>
					<a href="<?=base_url("cArticle")?>">Articles</a>
				</li>
				<li>
					<ul class="collapsible" data-collapsible="accordion">
						<li>
							<div class="collapsible-header" style="margin-left:-6%">
								<a>Pages</a>
							</div>
							<div class="collapsible-body">
								<ul>
									<li><a href="<?=base_url("cPage")?>">Les pages</a></li>
									<li><a href="#!">Compagnies</a></li>
									<li><a href="#!">Images des pages</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Textes du Site</a>
				</li>
				<li>
					<a href="#">Langue du Site</a>
				</li>
				<li>
					<a href="#">Galerie</a>
				</li>
			</ul>
			<a href="#" data-activates="slide-out" class="button-collapse">	
				<i class="mdi-navigation-menu btnAccordeon"></i>
			</a>
		</nav>
		
		<div class="row">
			<div class="col s10 m10 l9 offset-s1 offset-m2 offset-l3">	
			