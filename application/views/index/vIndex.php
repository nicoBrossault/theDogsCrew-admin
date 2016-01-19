<script src="<?=base_url()?>assets/js/jquery.js"></script>
<?php
	if(isset($library_src) && isset($script_foot)){
		echo $library_src;
		echo $script_foot;
	}
?>
<script src="<?=base_url()?>assets/js/general.js"></script>
<script src="<?=base_url()?>assets/js/materialize.min.js"></script>

<div class="container">
<!-- ARTICLE -->
	<div class="col s8 m5 l4  hoverable">
		<a href="<?=base_url('cArticle')?>" class="teal-text text-darken-1">
			<div class="card small teal darken-1">
				<div class="card-image">
					<div class="container">
						<br>
						<br>
						<div class="col s10 m10 offset-s1 offset-m1">
				 			<img src="assets/images/article.png">
			 			</div>
		 			</div>
				</div>
				<div class="card-action white">
					<b>ARTICLES</b>
				</div>
		</div>
		</a>
	</div>
	
<!-- PAGE -->	
	<div class="col s8 m5 l4 hoverable">
		<a href="<?=base_url('cPage')?>" class="teal-text text-darken-1">
			<div class="card small teal darken-1">
				<div class="card-image">
					<div class="container">
						<br>
						<br>
						<br>
						<div class="col s10 m10 offset-s1 offset-m1">
				 			<img src="assets/images/page.png">
			 			</div>
		 			</div>
				</div>
				<div class="card-action white">
					<b>PAGES</b>
				</div>
			</div>
		</a>
	</div>

<!-- GALERIE -->	
	<div class="col s8 m5 l4 hoverable">
		<a href="#" class="teal-text text-darken-1">
			<div class="card small teal darken-1">
				<div class="card-image">
					<div class="container">
						<br>
						<br>
						<br>
						<div class="col s10 m10 offset-s1 offset-m1">
				 			<img src="assets/images/galerie.png">
			 			</div>
		 			</div>
				</div>
				<div class="card-action white">
					<b>GALERIE</b>
				</div>
			</div>
		</a>
	</div>

<!-- IMAGE PAGE -->	
	<div class="col s8 m5 l4 hoverable">
		<a href="#" class="teal-text text-darken-1">
			<div class="card small teal darken-1">
				<div class="card-image">
					<div class="container">
						<br>
						<br>
						<div class="col s12 m12">
				 			<img src="assets/images/imgPage.png">
			 			</div>
		 			</div>
				</div>
				<div class="card-action white">
					<b>IMAGES PAGES</b>
				</div>
			</div>
		</a>
	</div>

<!-- COMPAGNIE -->
	<div class="col s8 m5 l4 hoverable">
		<a href="<?=base_url('cCompagnie')?>" class="teal-text text-darken-1">
			<div class="card small teal darken-1">
				<div class="card-image">
					<div class="container">
						<br>
						<br>
						<br>
						<div class="col s10 m10 offset-s1 offset-m1">
				 			<img src="assets/images/banner-rond-01.png" style="margin-left:-5px;">
			 			</div>
		 			</div>
				</div>
				<div class="card-action white">
					<b>COMPAGNIE</b>
				</div>
			</div>
		</a>
	</div>

<!-- LANGUE -->
	<div class="col s8 m5 l4 hoverable">
		<a href="<?=base_url('cLangue')?>" class="teal-text text-darken-1">
			<div class="card small teal darken-1">
				<div class="card-image">
					<div class="container">
						<br>
						<br>
						<br>
						<div class="col s10 m10 offset-s1 offset-m1">
				 			<img src="assets/images/reglageLang.png">
			 			</div>
		 			</div>
				</div>
				<div class="card-action white">
					<b>LANGUES</b>
				</div>
			</div>
		</a>
	</div>

<!-- TEXT SITE -->
	<div class="col s8 m5 l4 offset-s0 offset-m0 offset-l4 hoverable">
		<a href="<?=base_url('cTexte')?>" class="teal-text text-darken-1">
			<div class="card small teal darken-1">
				<div class="card-image">
					<div class="container">
						<br>
						<br>
						<br>
						<div class="col s10 m10 offset-s1 offset-m1">
				 			<img src="assets/images/reglageLang.png">
			 			</div>
		 			</div>
				</div>
				<div class="card-action white">
					<b>TEXTE DU SITE</b>
				</div>
			</div>
		</a>
	</div>
</div>