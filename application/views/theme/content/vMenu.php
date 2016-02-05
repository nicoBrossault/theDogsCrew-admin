<?php
	use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
?>
<!DOCTYPE html>
	<head>
		<title>Admin <?=$titre?></title>
		<meta charset="UTF-8">
		<!--Import Google Icon Font-->
      	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	</head>
	<body>
		<nav class="teal darken-1" style="margin-bottom: 5%; color:gray">
			<span class="brand-logo right" style="margin-right:33%;"><?=$titre?></span>
  			<ul id="slide-out" class="side-nav fixed">
  				<div class="card" style="margin-top:-20px;">
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
						<ul class="collapsibleUser">
							<li>
								<div class="collapsibleUser-header" style="margin-left:-6%">
									<?php if(isset($_SESSION['user'])):
										$user=$this->doctrine->em->find('user',$_SESSION['user']);
										$idTypeUser=$user->getIdtype()->getIdTYpe();
									?>
										<a href="#" class="user">
											<i class="material-icons left">account_circle</i>
											<?=$user->getPrenom()?>
											<i class="material-icons right divCircle openUser teal darken-1 center-align">
												keyboard_arrow_down
											</i>
											<i class="material-icons right divCircle closeUser teal darken-1 center-align">
												keyboard_arrow_up
											</i>
										</a>
									<?php endif; ?>
								</div>
								<div class="collapsibleUser-body">
									<div class="card">
										<div class="card-title blue-grey darken-1 white-text" style="padding:2%">
											Utilisateur :
										</div>
										<div class="card-content" style="padding:2%">
											<?=$user->getPrenom().' '.$user->getNom()?><br>
											Type : <?=utf8_encode($user->getIdtype()->getLibelle())?>
										</div>
										<div class="card-action" style="padding-bottom:50px">
												<a href="<?=base_url("cUser")?>" style="color:#888888; width:35%; float:left; margin-top:-10px;"
												class="tooltipped" data-position="top" data-delay="50" 
												<?php if($idTypeUser==1): ?>data-tooltip="Modifier les utilisateurs"
												<?php else: ?> data-tooltip="Modifier mes informations"
												<?php endif; ?>>
												<i class="material-icons left">account_circle</i>
											</a>
											<a href="<?=base_url('index')?>/disconnect" style="color:red; width:35%; float:left; margin-top:-10px;"
											class="tooltipped" data-position="top" data-delay="50" data-tooltip="Déconnexion">
												<i class="material-icons">power_settings_new</i>
											</a>
										</div>
									</div>
								</div>
							</li>
						</ul>
						<a href="<?=base_url()?>">
							<i class="material-icons left">home</i>
							Home
						</a>
					</div>
				</div>
				<li>
					<i class="material-icons left">insert_comment</i>
					<a href="<?=base_url("cArticle")?>">Articles</a>
				</li>
				<li>
					<ul class="collapsiblePage">
						<li>
							<div class="collapsiblePage-header" style="margin-left:-6%">
								<i class="material-icons left">library_books</i>
								<a>
									Pages
									<i class="material-icons right open divCircle teal darken-1 center-align">
										keyboard_arrow_down
									</i>
									<i class="material-icons right close divCircle teal darken-1 center-align">
										keyboard_arrow_up
									</i>
								</a>
							</div>
							<div class="collapsiblePage-body">
								<ul>
									<li>
										<i class="material-icons left">library_books</i>
										<a href="<?=base_url("cPage")?>">Les pages</a>
									</li>
									<li>
										<i class="material-icons left">pets</i>
										<a href="<?=base_url("cCompagnie")?>">Compagnies</a>
									</li>
									<li>
										<i class="material-icons left">art_track</i>
										<a href="<?=base_url("cImagePage")?>">Images Pages</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</li>
				<li>
					<i class="material-icons left">photo_library</i>
					<a href="<?=base_url("cGalerie")?>">Galerie</a>
				</li>
				<?php if($idTypeUser==1): ?>
					<li>
						<i class="material-icons left">view_compact</i>
						<a href="<?=base_url("cTexte")?>">Textes du Site</a>
					</li>
					<li>
						<i class="material-icons left">language</i>
						<a href="<?=base_url("cLangue")?>">Langue du Site</a>
					</li>
				<?php endif; ?>
			</ul>
			<a href="#" data-activates="slide-out" class="button-collapse">	
				<i class="mdi-navigation-menu btnAccordeon"></i>
			</a>
		</nav>
		
		<div class="row">
			<div class="col s10 m10 l9 offset-s1 offset-m1 offset-l3">	
			