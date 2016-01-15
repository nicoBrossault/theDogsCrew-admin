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
			foreach ($articles as $article):
		?>
		<li>
			<div class="collapsible-header">
				<label>Article <?=$article->getIdArticle()?> : </label>
				<?=character_limiter($article->getTexte(),30)?>
			</div>
			<div class="collapsible-body white">
				<div class="row">
					<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
						<label style="font-size:20px;">Identifiant : </label>
						<br>
						<?=$article->getIdArticle()?>
						<br>
						<br>
						<label style="font-size:20px;">Contenu : </label>
						<br>
						<?=$article->getTexte()?>
						<br>
						<br>
						<label style="font-size:20px;">Date : </label>
						<br>
						<?php
							$date = $article->getDate();
							$result = $date->format('Y-m-d');
							if ($result) {
								echo $result;
							} else { // format failed
								echo "Unknown Time";
							}				
						?>
					</div>
				</div>
				<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
					<a class="btn-floating btn-large red">
						<i class="large material-icons">mode_edit</i>
					</a>
					<ul>
						<li>
							<a class="btn-floating red modifier" id="<?=$article->getIdArticle()?>">
								<i class="material-icons">mode_edit</i>
								<?=$idArticle=$article->getIdArticle()?>
							</a>
						</li>
						<li>
							<a class="btn-floating yellow darken-1 supprimer" id="<?=$article->getIdArticle()?>">
								<i class="material-icons">delete</i>
								<?=$article->getIdArticle()?>
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
<ul class="pagination">
	<?php for ($i=0; $i<$nbPages; $i++): ?>
		<?php if($numA==($i+1)):?>
			<li class="page active" id="<?=$i+1 ?>">
		<?php else : ?>
			<li class="waves-effect page" id="<?=$i+1 ?>">
		<?php  endif ?>
			<a><?=$i+1 ?></a></li>
	<?php endfor ?>
</ul>