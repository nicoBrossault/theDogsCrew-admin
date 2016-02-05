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
			foreach ($comps as $comp):
		?>
		<li>
			<div class="collapsible-header">
				<label>Compagnie <?=$comp->getIdcompagnie()?> : </label>
				<?=utf8_encode($comp->getTitre())?>
				<i style='font-size:10px; color: gray;'>
					<?=utf8_encode($this->doctrine->em->find('langue',$comp->getIdlangue())->getLangue())?>
				</i>
				
			</div>
			<div class="collapsible-body white">
				<div class="row">
					<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
						<label style="font-size:20px;">Identifiant : </label>
						<br>
						<?=$comp->getIdcompagnie()?>
						<br>
						<br>
						<?php if($user->getIdType()->getIdType()!=2): ?>
						<label style="font-size:20px;">Auteur : </label>
						<br>
						<?php
							$thisAuthor=$this->doctrine->em->find('user',$comp->getIduser());
							echo $thisAuthor->getPrenom().' '.$thisAuthor->getNom()
						?>
						<br>
						<br>
						<?php endif; ?>
						<label style="font-size:20px;">Contenu : </label>
						<br>
						<?=utf8_encode($comp->getTexte())?>
						<br>
						<br>
						<?php if(!empty($comp->getImage())) :?>
							<label style="font-size:20px;">Image : </label>
							<br>
							<img src="/theDogsCrew/theDogsCrew-site/<?=$comp->getImage()?>" style="width:20%">
							<br>
							<br>
						<?php endif ?>
						<label style="font-size:20px;">Date : </label>
						<br>
						<?php
							$date = $comp->getDate();
							$result = $date->format('Y-m-d');
							if ($result) {
								echo $result;
							} else { // format failed
								echo "Unknown Time";
							}				
						?>
					</div>
				</div>
				<div class="fixed-action-btn horizontal" style="bottom: 45px; right:96px;;">
					<a class="btn-floating btn-large red">
						<i class="large material-icons">mode_edit</i>
					</a>
					<ul>
						<li>
							<a class="btn-floating red modifier" id="<?=$comp->getIdcompagnie()?>">
								<i class="material-icons">mode_edit</i>
								<?=$idCompagnie=$comp->getIdcompagnie()?>
							</a>
						</li>
						<?php if($user->getIdtype()->getIdTYpe()!=3): ?>
							<li>
								<a class="btn-floating yellow darken-1 supprimer" id="<?=$comp->getIdcompagnie()?>">
									<i class="material-icons">delete</i>
									<?=$comp->getIdcompagnie()?>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</li>
		<?php endforeach; ?>	
	</ul>
</div>
<?php if($user->getIdtype()->getIdTYpe()!=3): ?>
<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
	<a id="<?=NULL?>"class="btn-floating btn-large waves-effect waves-light red addPage">
	  	<i class="material-icons">add</i>
	</a>
</div>
<?php endif; ?>