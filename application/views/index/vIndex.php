<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<meta charset="UTF-8">
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/menu.js"></script>
		<script type="text/javascript" src="assets/js/materialize.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>
	<body>
		<?php echo $library_src;?>
		<?php echo $script_foot;?>
		<nav>
  			<ul class="right hide-on-med-and-down">
					<li>
						<a class="article">Articles</a>
					</li>
					<li>
						<a href="#">Pages</a>
					</li>
					<li>
						<a href="#">Images Pages</a>
					</li>
					<li>
						<a href="#">Textes du Site</a>
					</li>
					<li>
						<a href="#">Compagnie</a>
					</li>
					<li>
						<a href="#">Galerie</a>
					</li>
				</ul>
				<ul id="slide-out" class="side-nav">
					<li>
						<a href="#">Articles</a>
					</li>
					<li>
						<a href="#">Pages</a>
					</li>
					<li>
						<a href="#">Images Pages</a>
					</li>
					<li>
						<a href="#">Textes du Site</a>
					</li>
					<li>
						<a href="#">Compagnie</a>
					</li>
					<li>
						<a href="#">Galerie</a>
					</li>
				</ul>
				<a href="#" data-activates="slide-out" class="button-collapse">	
					<i class="mdi-navigation-menu"></i>
				</a>
			</nav>
		
		<div class="col s12 m9" style="background-color: green">
			<!-- Page Content -->
			<div class="content"> </div>
		</div>
		<div id="reponse"></div>
	</body>
</html>