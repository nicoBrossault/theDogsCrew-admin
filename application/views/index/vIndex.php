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
	<div class="col s10 m6 l4  hoverable">
		<a href="<?=base_url('cArticle')?>" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text" 
				style="padding-top:10%; padding-bottom:10%; padding-left:25%">
					<i class="material-icons" style="font-size:80px;">insert_comment</i>
				</div>
				<div class="card-action white">
					<b>ARTICLES</b>
				</div>
			</div>
		</a>
	</div>
	
<!-- PAGE -->	
	<div class="col s10 m6 l4  hoverable">
		<a href="<?=base_url('cPage')?>" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text" 
				style="padding-top:10%; padding-bottom:10%; padding-left:25%">
					<i class="material-icons" style="font-size:80px;">library_books</i>
				</div>
				<div class="card-action white">
					<b>PAGES</b>
				</div>
			</div>
		</a>
	</div>

<!-- GALERIE -->	
	<div class="col s10 m6 l4  hoverable">
		<a href="#" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text" 
				style="padding-top:10%; padding-bottom:10%; padding-left:25%">
					<i class="material-icons" style="font-size:80px;">photo_library</i>
				</div>
				<div class="card-action white">
					<b>GALERIE</b>
				</div>
			</div>
		</a>
	</div>

<!-- IMAGE PAGE -->	
	<div class="col s10 m6 l4  hoverable">
		<a href="#" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text" 
				style="padding-top:10%; padding-bottom:10%; padding-left:25%">
					<i class="material-icons" style="font-size:80px;">art_track</i>
				</div>
				<div class="card-action white">
					<b>IMAGES PAGES</b>
				</div>
			</div>
		</a>
	</div>

<!-- COMPAGNIE -->
	<div class="col s10 m6 l4  hoverable">
		<a href="<?=base_url('cCompagnie')?>" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text" 
				style="padding-top:10%; padding-bottom:10%; padding-left:25%">
					<i class="material-icons" style="font-size:80px;">pets</i>
				</div>
				<div class="card-action white">
					<b>COMPAGNIE</b>
				</div>
			</div>
		</a>
	</div>

<!-- LANGUE -->
	<div class="col s10 m6 l4  hoverable">
		<a href="<?=base_url('cLangue')?>" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text" 
				style="padding-top:10%; padding-bottom:10%; padding-left:25%">
					<i class="material-icons" style="font-size:80px;">language</i>
				</div>
				<div class="card-action white">
					<b>Langue</b>
				</div>
			</div>
		</a>
	</div>

<!-- TEXT SITE -->
	<div class="col s10 m6 l4 offset-m3 offset-l4 hoverable">
		<a href="<?=base_url('cLangue')?>" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text" 
				style="padding-top:10%; padding-bottom:10%; padding-left:25%">
					<i class="material-icons" style="font-size:80px;">view_compact</i>
				</div>
				<div class="card-action white">
					<b>TEXTE DU SITE</b>
				</div>
			</div>
		</a>
	</div>
</div>