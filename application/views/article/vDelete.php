<script src="<?=base_url()?>assets/js/jquery.js"></script>
<?php
	if(isset($library_src) && isset($script_foot)){
		echo $library_src;
		echo $script_foot;
	}
?>
<div class="row" style="margin-top: 2%;">
	<div class="col s8 m5 offset-s2 offset-m4">
		<div class="card hoverable">
			<div class="card-title teal darken-1 white-text" style="text-align:center; padding:2%">
				<?php if(!isset($msg)):?>
					<b>Supprimer l'article "<?=$article->getTitre()?>" ?</b>
				<?php else : echo $msg?>
				<?php endif; ?>
			</div>
			<div class="card-content center-align">
				<?php if(!isset($msg)):?>
					<a class="btn waves-effect waves-light delete" id="<?=$id?>">
						Valider
						<i class="material-icons left">check_circle</i>
					</a>
					
					<a href="<?=base_url('cArticle')?>" class="btn waves-effect waves-light cancel" id="annuler">
						Annuler
						<i class="material-icons left">highlight_off</i>
					</a>
				<?php else : ?>
					<a href="<?=base_url('cArticle')?>" class="btn waves-effect waves-light">
						Ok
						<i class="material-icons left">done</i>
					</a>
				<?php endif?>
			</div>
		</div>
	</div>
</div>