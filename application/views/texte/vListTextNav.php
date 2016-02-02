<?php
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
use Doctrine\ORM\Query\AST\Functions\SubstringFunction;
?>
<script src="<?=base_url()?>assets/js/jquery.js"></script>
<?php
	if(isset($library_src) && isset($script_foot)){
		echo $library_src;
		echo $script_foot;
	}
?>
<script src="<?=base_url()?>assets/js/general.js"></script>
<script src="<?=base_url()?>assets/js/materialize.min.js"></script>

<div class="list">
	<ul class="collapsible popout" data-collapsible="accordion" style="box-shadow:none">
		<?php
			foreach ($textNav as $texte):
		?>
		<li>
			<div class="collapsible-header">
				Texte pour la NavBar en 
				<?=utf8_encode($this->doctrine->em->find('langue',$texte->getIdlangue())->getLangue())?>
			</div>
			<div class="collapsible-body white">
				<div class="row">
					<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
						<label style="font-size:20px;">Identifiant : </label>
						<br>
						<?=$texte->getIdlanguenavbar()?>
						<br>
						<br>
						<label style="font-size:20px;">Contenu : </label>
						<br>
						<?php $textNav=explode("-",$texte->getTexte());?>
							Texte pour le bouton "Plus" : <?=$textNav[0]?><br>
							Texte pour le bouton "Accueil" : <?=$textNav[1]?><br>
							Texte pour le bouton "Compagnie" : <?=$textNav[2]?><br>
							Texte pour le bouton "Article" : <?=$textNav[3]?><br>
							Texte pour le bouton "Galerie" : <?=$textNav[4]?><br>
							Texte pour le bouton "Contact" : <?=$textNav[5]?><br>
						<br>
					</div>
				</div>
				<div class="fixed-action-btn horizontal" style="bottom: 45px; right:96px;;">
					<a class="btn-floating btn-large red">
						<i class="large material-icons">mode_edit</i>
					</a>
					<ul>
						<li>
							<a class="btn-floating red modifierTextNav" id="<?=$texte->getIdlanguenavbar()?>">
								<i class="material-icons">mode_edit</i>
								<?=$texte->getIdlanguenavbar()?>
							</a>
						</li>
						<li>
							<a class="btn-floating yellow darken-1 supprimerTextNav" id="<?=$texte->getIdlanguenavbar()?>">
								<i class="material-icons">delete</i>
								<?=$texte->getIdlanguenavbar()?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</li>
		<?php endforeach; ?>	
	</ul>
</div>
<br>