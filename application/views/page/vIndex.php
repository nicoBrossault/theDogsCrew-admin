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
			foreach ($pages as $page):
		?>
		<li>
			<div class="collapsible-header">
				<label>page <?=$page->getIdpage()?> : </label>
				<?=utf8_encode(character_limiter($page->getTitre(),30))?> 
				<i style='font-size:10px; color: gray;'>
					<?=utf8_encode($page->getIdlangue()->getLangue())?>
				</i>
			</div>
			<div class="collapsible-body white">
				<div class="row">
					<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
						<label style="font-size:20px;">Identifiant : </label>
						<br>
						<?=$page->getIdpage()?>
						<br>
						<br>
						<?php if($user->getIdType()->getIdType()!=2): ?>
						<label style="font-size:20px;">Auteur : </label>
						<br>
						<?=$page->getIduser()->getPrenom().' '.$page->getIduser()->getNom()?>
						<br>
						<br>
						<?php endif; ?>
						<label style="font-size:20px;">Contenu : </label>
						<br>
						<?=utf8_encode($page->getTexte())?>
						<br>
						<br>
						<?php if($page->getImage()!="") :?>
							<label style="font-size:20px;">Image : </label>
							<br>
							<img src="/theDogsCrew/theDogsCrew-site/<?=$page->getImage()?>" style="width:20%">
							<br>
							<br>
						<?php endif ?>
						<label style="font-size:20px;">Date : </label>
						<br>
						<?php
							$date = $page->getDate();
							echo $date->format('Y-m-d');			
						?>
					</div>
				</div>
        
				<div class="fixed-action-btn horizontal" style="bottom: 45px; right:96px;">
					<a class="btn-floating btn-large red">
						<i class="large material-icons">mode_edit</i>
					</a>
					<ul>
						<li>
							<a class="btn-floating red modifier" id="<?=$page->getIdpage()?>">
								<i class="material-icons">mode_edit</i>
								<?=$page->getIdpage()?>
							</a>
						</li>
						<?php if($user->getIdtype()->getIdTYpe()!=3): ?>
							<li>
								<a class="btn-floating yellow darken-1 supprimer" id="<?=$page->getIdpage()?>">
									<i class="material-icons">delete</i>
									<?=$page->getIdpage()?>
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
<?php if($user->getIdtype()->getIdTYpe()==3): ?>
	<br>
	<h5>Page Corrigées Non Validés:</h5>
	<br>
	<div class="list">
		<ul class="collapsible popout" data-collapsible="accordion" style="box-shadow:none">
			<?php
				foreach ($pagestemp as $pagetemp):
			?>
			<li>
				<div class="collapsible-header">
					<label>Page : </label>
					<?=utf8_encode($pagetemp->getTitre())?>
					<i style='font-size:10px; color: gray;'>
						<?=utf8_encode($this->doctrine->em->find('langue',$pagetemp->getIdlanguetemp())->getLangue())?>
					</i>
				</div>
				<div class="collapsible-body white">
					<div class="row">
						<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
							<label style="font-size:20px;">Identifiant : </label>
							<br>
							<?=$this->doctrine->em->find('page',$pagetemp->getIdpage())->getIdpage()?>
							<br>
							<br>
							<?php if($user->getIdType()->getIdType()!=2): ?>
							<label style="font-size:20px;">Auteur : </label>
							<br>
							<?php 
								$author=$this->doctrine->em->find("user",$pagetemp->getIdusertemp());
								echo $author->getPrenom().' '.$author->getNom()?>
							<br>
							<br>
							<?php endif; ?>
							<label style="font-size:20px;">Langue : </label>
							<br>
							<?=utf8_encode($this->doctrine->em->find('langue',$pagetemp->getIdlanguetemp())->getLangue())?>
							<br>
							<br>
							<label style="font-size:20px;">Contenu : </label>
							<br>
							<?=utf8_encode($pagetemp->getTexte())?>
							<br>
							<br>
							<?php if($pagetemp->getImagetemp()!="") :?>
							<label style="font-size:20px;">Image : </label>
							<br>
							<img src="/theDogsCrew/theDogsCrew-site/<?=$pagetemp->getImagetemp()?>" style="width:20%">
							<br>
							<br>
							<?php endif ?>
							<label style="font-size:20px;">Date : </label>
							<br>
							<?php
								$datetemp = $pagetemp->getDate();
								$result = $datetemp->format('Y-m-d');
								if ($result) {
									echo $result;
								} else { // format failed
									echo "Unknown Time";
								}				
							?>
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
								<a class="btn-floating red modifier" id="<?=$this->doctrine->em->find('page',$pagetemp->getIdpage())->getIdpage()?>">
									<i class="material-icons">mode_edit</i>
									<?=$this->doctrine->em->find('page',$pagetemp->getIdpage())->getIdpage()?>
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