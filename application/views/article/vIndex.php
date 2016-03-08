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
				<?=utf8_encode($article->getTitre())?>
				<i style='font-size:10px; color: gray;'>
					<?=utf8_encode($article->getIdlangue()->getLangue())?>
				</i>
			</div>
			<div class="collapsible-body white">
				<div class="row">
					<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
						<label style="font-size:20px;">Identifiant : </label>
						<br>
						<?=$article->getIdArticle()?>
						<br>
						<br>
						<?php if($user->getIdType()->getIdType()!=2): ?>
						<label style="font-size:20px;">Auteur : </label>
						<br>
						<?=$article->getIduser()->getPrenom().' '.$article->getIduser()->getNom()?>
						<br>
						<br>
						<?php endif; ?>
						<label style="font-size:20px;">Langue : </label>
						<br>
						<?=utf8_encode($article->getIdlangue()->getLangue())?>
						<br>
						<br>
						<label style="font-size:20px;">Contenu : </label>
						<br>
						<?=utf8_encode($article->getTexte())?>
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
				<div class="fixed-action-btn horizontal" style="bottom: 45px; right:96px;">
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
						<?php if($user->getIdtype()->getIdTYpe()!=3): ?>
						<li>
							<a class="btn-floating yellow darken-1 supprimer" id="<?=$article->getIdarticle()?>">
								<i class="material-icons">delete</i>
								<?=$article->getIdarticle()?>
							</a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</li>
		<?php endforeach; ?>	
	</ul>
</div>
<?php if($user->getIdtype()->getIdTYpe()==3): ?>
	<br>
	<h5>Article Corrigés Non Validés:</h5>

	<div class="list">
		<ul class="collapsible popout" data-collapsible="accordion" style="box-shadow:none">
			<?php
				foreach ($articlestemp as $articletemp):
			?>
			<li>
				<div class="collapsible-header">
					<label>Article : </label>
					<?=utf8_encode($articletemp->getTitretemp())?>
					<i style='font-size:10px; color: gray;'>
						<?=utf8_encode($articletemp->getIdlanguetemp()->getLangue())?>
					</i>
				</div>
				<div class="collapsible-body white">
					<div class="row">
						<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
							<label style="font-size:20px;">Identifiant : </label>
							<br>
							<?=$articletemp->getIdArticle()->getIdArticle()?>
							<br>
							<br>
							<?php if($user->getIdType()->getIdType()!=2): ?>
							<label style="font-size:20px;">Auteur : </label>
							<br>
							<?=$articletemp->getIdusertemp()->getPrenom().' '.$articletemp->getIdusertemp()->getNom()?>
							<br>
							<br>
							<?php endif; ?>
							<label style="font-size:20px;">Langue : </label>
							<br>
							<?=utf8_encode($articletemp->getIdlanguetemp()->getLangue())?>
							<br>
							<br>
							<label style="font-size:20px;">Contenu : </label>
							<br>
							<?=utf8_encode($articletemp->getTextetemp())?>
							<br>
							<br>
							<label style="font-size:20px;">Date : </label>
							<br>
							<?php
								$datetemp = $articletemp->getDatetemp();
								$result = $datetemp->format('Y-m-d');
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
							<?php if($articletemp->getIdpagetemp()!=NULL):
								$page=$this->doctrine->em->find('Page', $articletemp->getIdpagetemp());
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
					<div class="fixed-action-btn horizontal" style="bottom: 45px; right:96px;">
						<a class="btn-floating btn-large red">
							<i class="large material-icons">mode_edit</i>
						</a>
						<ul>
							<li>
								<a class="btn-floating red modifier" id="<?=$articletemp->getIdarticle()->getIdarticle()?>">
									<i class="material-icons">mode_edit</i>
									<?=$articletemp->getIdarticle()->getIdarticle()?>
								</a>
							</li>
						</ul>
					</div>
				</li>
			<?php endforeach; ?>	
		</ul>
	</div>
<?php endif?>
<?php if($user->getIdtype()->getIdTYpe()!=3): ?>
<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
	<a id="<?=NULL?>"class="btn-floating btn-large waves-effect waves-light red addPage">
	  	<i class="material-icons">add</i>
	</a>
</div>
<br>
<?php endif; ?>
<?php
	echo "<br>".$this->pagination->create_links();
?>