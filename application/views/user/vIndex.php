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
			foreach ($users as $user):
		?>
		<li>
			<div class="collapsible-header">
			<?php if($user->getIdType()->getIdtype()==1):?>
				<span class="teal darken-1 bandeauUser">
			<?php else: ?>
				<?php if($user->getIdType()->getIdtype()==2):?>
					<span class="cyan darken-1 bandeauUser">
				<?php else: ?>
					<span class="lime darken-1 bandeauUser">
				<?php endif; ?>
			<?php endif; ?>
					<?=utf8_encode($user->getIdType()->getlibelle())?>
				</span>
				<div class="titre">
					<label>user <?=$user->getIduser()?> : </label>
					<?=utf8_encode($user->getPrenom().' '.$user->getNom())?>
				</div>
			</div>
			<div class="collapsible-body white">
				<div class="fixed-action-btn horizontal" style="bottom: 45px; right:96px;">
					<a class="btn-floating btn-large red">
						<i class="large material-icons">mode_edit</i>
					</a>
					<ul>
						<li>
							<a class="btn-floating red modifier" id="<?=$user->getIduser()?>">
								<i class="material-icons">mode_edit</i>
								<?=$user->getIduser()?>
							</a>
						</li>
						<li>
							<a class="btn-floating yellow darken-1 supprimer" id="<?=$user->getIduser()?>">
								<i class="material-icons">delete</i>
								<?=$user->getIduser()?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</li>
		<?php endforeach; ?>	
	</ul>
</div>
<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
	<a id="<?=NULL?>"class="btn-floating btn-large waves-effect waves-light red addUser">
	  	<i class="material-icons">add</i>
	</a>
</div>
<br>