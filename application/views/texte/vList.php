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
			foreach ($textes as $texte):
		?>
		<li>
			<div class="collapsible-header">
				<label>texte <?=$texte->getIdtext()?> : </label>
				<?=utf8_encode($texte->getlibelle())?>
			</div>
			<div class="collapsible-body white">
				<div class="row">
					<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
						<label style="font-size:20px;">Identifiant : </label>
						<br>
						<?=$texte->getIdtext()?>
						<br>
						<br>
						<label style="font-size:20px;">Contenu : </label>
						<br>
						<?=utf8_encode($texte->getText())?>
						<br>
					</div>
				</div>
				<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
					<a class="btn-floating btn-large red">
						<i class="large material-icons">mode_edit</i>
					</a>
					<ul>
						<li>
							<a class="btn-floating red modifier" id="<?=$texte->getIdtext()?>">
								<i class="material-icons">mode_edit</i>
								<?=$texte->getIdtext()?>
							</a>
						</li>
						<li>
							<a class="btn-floating yellow darken-1 supprimer" id="<?=$texte->getIdtext()?>">
								<i class="material-icons">delete</i>
								<?=$texte->getIdtext()?>
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