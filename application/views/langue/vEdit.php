<?php
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
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

<div class="card">
<div class="card-title teal darkness-1 white-text" style="padding:2%;">Modifier la langue</div>
	<div class="card-content">
	<?php
		echo form_open('formLangue');
		
		echo form_hidden('idLangue',$langue->getId());
		
		$nomLangue=$langue->getLangue();
		$langueNom= array(
				'name'=>'langue',
				'id'=>'langue',
				'placeholder'=>'langue',
				'value'=>utf8_encode($nomLangue),
		);
		echo '<label for="langue"><h5>Langue</h5></label>';
		echo form_input($langueNom);
	?>
	<div class="card-action" style="margin-bottom: 2%">
		<button class="btn waves-effect waves-light right" type="submit" name="action">
			Modifier
			<i class="material-icons right">add</i>
		</button>
	</div>
	<?php    
		echo form_close(); 
	?>
	</div>
</div>