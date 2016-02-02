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
<div class="card col s10 m10 l10" style="padding:2%;">
	<h4 style="padding-bottom:2%;">Ajouter une image : </h4>
	<?php
		echo form_open('formImgPage');
	?>
		<div class="file-field input-field">
			<div class="btn">
				<span>File</span>
				<input type="file">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate" type="text">
			</div>
		</div>
		
		<button class="btn waves-effect waves-light right" type="submit" name="action" style="margin:2%;">
			Ajouter
			<i class="material-icons right">add</i>
		</button>
	<?php    
		echo form_close();
	?>
</div>