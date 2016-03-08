<script src="<?=base_url()?>assets/js/jquery.js"></script>
<?php
	if(isset($library_src) && isset($script_foot)){
		echo $library_src;
		echo $script_foot;
	}
?>
<script src="<?=base_url()?>assets/js/general.js"></script>
<script src="<?=base_url()?>assets/js/materialize.min.js"></script>
<?php
if(isset($msgArticle) && !empty($msgArticle)):
foreach($msgArticle as $msgA):

if($user->getIduser()==1 || $msgA->getIdarticle()->getIduser()->getIduser()==$user->getIduser()):?>
	<div class="row" style="margin-top: 2%; text-align:center; color:white">
		<div class="col s10 m6 offset-s1 offset-m3">
			<div class="card teal darken-1">
				L'article : 
				<span style="background-color:white">
					<a href='<?=base_url('cArticle')?>/addTemp?id=<?=$msgA->getIdArticletemp()?>'>
						<?=utf8_encode($msgA->getIdArticle()->getTitre())?>
					</a>
				</span>
				 a été modifié. Valider ?
			</div>
		</div>
	</div>
<?php
endif;
endforeach;
endif;
?>

<?php
if(isset($msgPage) && !empty($msgPage)):
foreach($msgPage as $msgP):

if($user->getIduser()==1 || $this->doctrine->em->find('page',$msgP->getIdpage())->getIduser()->getIduser()==$user->getIduser()):?>
	<div class="row" style="margin-top: 2%; text-align:center; color:white">
		<div class="col s10 m6 offset-s1 offset-m3">
			<div class="card teal darken-1">
				La page : 
				<span style="background-color:white">
					<a href='<?=base_url('cPage')?>/addTemp?id=<?=$msgP->getIdpagetemp()?>'>
						<?=utf8_encode($this->doctrine->em->find('page',$msgP->getIdpage())->getTitre())?>
					</a>
				</span>
				 a été modifiée. Valider ?
			</div>
		</div>
	</div>
<?php
endif;
endforeach;
endif;
?>

<?php
if(isset($msgComp) && !empty($msgComp)):
foreach($msgComp as $msgC):

if($user->getIduser()==1 || $msgC->getIdcompagnie()->getIduser()->getIduser()==$user->getIduser()):?>
	<div class="row" style="margin-top: 2%; text-align:center; color:white">
		<div class="col s10 m6 offset-s1 offset-m3">
			<div class="card teal darken-1">
				La page Compagnie : 
				<span style="background-color:white">
					<a href='<?=base_url('cCompagnie')?>/addTemp?id=<?=$msgC->getIdcompagnietemp()?>'>
						<?=utf8_encode($msgC->getIdcompagnie()->getTitre())?>
					</a>
				</span>
				 a été modifiée. Valider ?
			</div>
		</div>
	</div>
<?php
endif;
endforeach;
endif;
?>
<div class="container">
<!-- ARTICLE -->
	<div class="col s10 m6 l4  hoverable">
		<a href="<?=base_url('cArticle')?>" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text center-align">
					<i class="large material-icons">insert_comment</i>
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
				<div class="card-content white-text center-align">
					<i class="large material-icons">library_books</i>
				</div>
				<div class="card-action white">
					<b>PAGES</b>
				</div>
			</div>
		</a>
	</div>

<!-- GALERIE -->	
	<div class="col s10 m6 l4  hoverable">
		<a href="<?=base_url('cGalerie')?>" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text center-align">
					<i class="large material-icons">photo_library</i>
				</div>
				<div class="card-action white">
					<b>GALERIE</b>
				</div>
			</div>
		</a>
	</div>

<!-- IMAGE PAGE -->	
	<div class="col s10 m6 l4  hoverable">
		<a href="<?=base_url('cImagePage')?>" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text center-align">
					<i class="large material-icons">art_track</i>
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
				<div class="card-content white-text center-align">
					<i class="large material-icons">pets</i>
				</div>
				<div class="card-action white">
					<b>COMPAGNIE</b>
				</div>
			</div>
		</a>
	</div>
<?php
	$user=$this->doctrine->em->find('user', $_SESSION['user']);
	$idTypeUser=$user->getIdtype()->getIdTYpe();
	if($idTypeUser==1):
?>
<!-- LANGUE -->
	<div class="col s10 m6 l4  hoverable">
		<a href="<?=base_url('cLangue')?>" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text center-align">
					<i class="large material-icons">language</i>
				</div>
				<div class="card-action white">
					<b>Langue</b>
				</div>
			</div>
		</a>
	</div>

<!-- TEXT SITE -->
	<div class="col s10 m6 l4 offset-m3 offset-l4 hoverable">
		<a href="<?=base_url('cTexte')?>" class="teal-text text-darken-1">
			<div class="card teal darken-1">
				<div class="card-content white-text center-align">
					<i class="large material-icons">view_compact</i>
				</div>
				<div class="card-action white">
					<b>TEXTE DU SITE</b>
				</div>
			</div>
		</a>
	</div>
</div>
<?php endif;?>