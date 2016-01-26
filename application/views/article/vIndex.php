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
				<label>Article : </label>
				<?=$article->getTitre()?>
			</div>
			<div class="collapsible-body white">
				<div class="row">
					<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
						<label style="font-size:20px;">Identifiant : </label>
						<br>
						<?=$article->getIdArticle()?>
						<br>
						<br>
						<label style="font-size:20px;">Langue : </label>
						<br>
						<?=utf8_encode($article->getIdlangue()->getLangue())?>
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
						<br>
						<br>
						<label style="font-size:20px;">Page Associée : </label>
						<br>
						<?php if($article->getIdpage()!=NULL):
							$page=$this->doctrine->em->find('Page', $article->getIdpage());
						?>
							<a href="<?=base_url('cPage')?>/add/<?=$page->getIdpage()?>">
								<?=$page->getTitre()?>
							</a>
						<?php else: ?>
							Aucune Page Associée.
						<?php endif; ?>
						<br>
						<br>
					</div>
				</div>
				<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
					<a class="btn-floating btn-large red">
						<i class="large material-icons">mode_edit</i>
					</a>
					<ul>
						<li>
							<a class="btn-floating red modifier" id="<?=$article->getIdarticle()?>">
								<i class="material-icons">mode_edit</i>
								<?=$article->getIdarticle()?>
							</a>
						</li>
						<li>
							<a class="btn-floating yellow darken-1 supprimer" id="<?=$article->getIdarticle()?>">
								<i class="material-icons">delete</i>
								<?=$article->getIdarticle()?>
							</a>
						</li>
					</ul>
				</div>
			</li>
		<?php endforeach; ?>	
	</ul>
</div>

<?php
	echo "<br>".$this->pagination->create_links();
?>