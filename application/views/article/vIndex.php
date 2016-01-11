<?php
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
use Doctrine\ORM\Query\AST\Functions\SubstringFunction;
?>
<div id="list">
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
						<li><a class="btn-floating red"><i class="material-icons modifier">mode_edit</i></a></li>
						<li><a class="btn-floating yellow darken-1"><i class="material-icons supprimer">delete</i></a></li>
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
		<li class="waves-effect page active" id="<?=$i+1 ?>"><a><?=$i+1 ?></a></li>
	<?php endfor ?>
</ul>