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

	<h5>Page Compagnie Corrigées Non Validés:</h5>
	<br>
	<div class="list">
		<ul class="collapsible popout" data-collapsible="accordion" style="box-shadow:none">
			<li>
				<div class="collapsible-header">
					<label>Page : </label>
					<?=utf8_encode($compTemp->getTitretemp())?>
					<i style='font-size:10px; color: gray;'>
						<?=utf8_encode($compTemp->getIdlangue()->getLangue())?>
					</i>
				</div>
				<div class="collapsible-body white">
					<div class="row">
						<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
							<label style="font-size:20px;">Identifiant : </label>
							<br>
							<?=$compTemp->getIdcompagnie()->getIdcompagnie()?>
							<br>
							<br>
							<?php if($user->getIdType()->getIdType()!=2): ?>
							<label style="font-size:20px;">Auteur : </label>
							<br>
							<?=$compTemp->getIduser()->getPrenom().' '.$compTemp->getIduser()->getNom()?>
							<br>
							<br>
							<?php endif; ?>
							<label style="font-size:20px;">Langue : </label>
							<br>
							<?=utf8_encode($compTemp->getIdlangue()->getLangue())?>
							<br>
							<br>
							<label style="font-size:20px;">Contenu : </label>
							<br>
							<?=utf8_encode($compTemp->getTextetemp())?>
							<br>
							<br>
							<?php if($compTemp->getImagetemp()!="") :?>
							<label style="font-size:20px;">Image : </label>
							<br>
							<img src="/theDogsCrew/theDogsCrew-site/<?=$compTemp->getImagetemp()?>" style="width:20%">
							<br>
							<br>
							<?php endif ?>
							<label style="font-size:20px;">Date : </label>
							<br>
							<?php
								$datetemp = $compTemp->getDate();
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
					<div class="row" style="margin-left:5%;">
					<a href="<?=base_url('cCompagnie')?>/validEdit?id=<?=$compTemp->getIdcompagnietemp()?>" class="btn waves-effect waves-light">
						Valider 
						<i class="material-icons left">check_circle</i>
					</a>
					
					<a href="<?=base_url('cCompagnie')?>/cancelEdit?id=<?=$compTemp->getIdcompagnietemp()?>" class="btn waves-effect waves-light">
						Annuler
						<i class="material-icons left">highlight_off</i>
					</a>
				</div>
				</div>
			</li>
		</ul>
	</div>