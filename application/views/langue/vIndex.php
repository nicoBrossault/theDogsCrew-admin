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
			foreach ($langues as $langue):
		?>
			<li>
				<div class="collapsible-header">
					<label>Langue <?=$langue->getId()?> : </label>
							<?=utf8_encode($langue->getLangue())?>
				</div>
				<div class="collapsible-body white">
					<div class="fixed-action-btn horizontal" style="bottom: 45px; right:96px;">
						<a class="btn-floating btn-large red">
							<i class="large material-icons">mode_edit</i>
						</a>
						<ul>
							<li>
									<a class="btn-floating red modifier" id="<?=$langue->getId()?>">
										<i class="material-icons">mode_edit</i>
										<?=$langue->getId()?>
									</a>
								</li>
								<li>
									<a class="btn-floating yellow darken-1 supprimer" id="<?=$langue->getId()?>">
										<i class="material-icons">delete</i>
										<?=$langue->getId()?>
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
	<a id="<?=NULL?>"class="btn-floating btn-large waves-effect waves-light red addLangue">
	  	<i class="material-icons">add</i>
	</a>
</div>