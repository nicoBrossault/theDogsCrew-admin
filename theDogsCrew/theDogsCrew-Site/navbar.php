<?php @session_start();
	include('php/script-nav.php');
?>
<div class="container-fluid generalNavBar">
	<nav class="navbar navbar-inverse row" style="padding-bottom: 10px; padding-left:10px;>
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header" style="margin-left:-10px;">
				<h3 style="color:#979797; margin-left: 20px;"><?=$accueilNav?></h3>
				<div class="col-md-12 col-sm-12">
					<img src="images/banner-rond-01.png" class="img-responsive" alt="Responsive image" style="max-width:100px; margin-left: 35px;"/>
					<h3 style="color:#979797">
						The Dog's Crew
					</h3>
					<span class="glyphicon glyphicon-triangle-bottom" style="color:#979797; margin-left:45%"></span>
				</div>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">				
				<ul class="nav navbar-nav navbar-right" style="margin-top:3%; margin-bottom:2%;">
					
					<!--Plus de page-->
					<li class="dropdown" style="max-width:75px;">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">	  
							<?=$plus ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<?php
								$sql=$db->query("SELECT * FROM page WHERE idLangue=".$_SESSION["langue"]." AND titre!='Compagnie' AND titre!='Company' AND titre!='Kompanie'");
								while ($data = $sql->fetch()){
									$id=$data['idPage'];
									echo utf8_encode('<li><a href="page.php?id='.$id.'" class="pageContient">'.$data['titre'].'</a></li>');
								}
						    ?>
					  	</ul>
					</li>
					
					<!--Accueil-->
					<li class="carre" style="float:left">
						<a href="index.php" data-toggle="tooltip" data-placement="top" title="<?=$accueil ?>">
							<div class="homePicto">
								<div class="dragon">
									<img src="images/dragon.png" class="dragon2 img-responsive" alt="Responsive image">
								</div>
							</div>
						</a>
					</li>
	
					<!--Compagnie-->
					<li class="carre" style="float:left;">
						<a href="compagnie.php" data-toggle="tooltip" data-placement="top" title="<?=$compagnie ?>">
							<div class="compagniePicto">
								<div class="dragon">
									<img src="images/dragon.png" class="dragon2 img-responsive" alt="Responsive image">
								</div>
							</div>
						</a>
					</li>
	
					<!--article-->
					<li class="carre" style="float:left;">
						<a href="article.php" data-toggle="tooltip" data-placement="top" title="<?=$article ?>">
							<div class="articlePicto">
								<div class="dragon">
									<img src="images/dragon.png" class="dragon2 img-responsive" alt="Responsive image">
								</div>
							</div>
						</a>
					</li>
	
					<!--galerie-->
					<li class="carre" style="float:left">
						<a href="galerie.php" data-toggle="tooltip" data-placement="top" title="<?=$galerie ?>">
							<div class="galeriePicto">
								<div class="dragon">
									<img src="images/dragon.png" class="dragon2 img-responsive" alt="Responsive image">
								</div>
							</div>
						</a>
					</li>
	
					<!--contact-->
					<li class="carre" style="float:left">
						<a href="contact.php" data-toggle="tooltip" data-placement="top" title="<?=$contact ?>">
							<div class="contactPicto">
								<div class="dragon">
									<img src="images/dragon.png" class="dragon2 img-responsive" alt="Responsive image">
								</div>
							</div>
						</a>
					</li>
        		</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</div>
<div class="scroll-langue">
	<div id="frm-lg" class="center-block" style="margin-top:30%; margin-left:5%">
		<?php include("php/langue.php") ?>
	</div>
</div>
<script src="script/general.js"></script>