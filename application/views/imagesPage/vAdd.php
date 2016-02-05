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

<?php if(isset($msg)):?>
	<div class="row" style="margin-top: 2%; text-align:center; color:white">
		<div class="col s10 m6 offset-s1 offset-m3">
			<div class="card red darken-4">
				<?=$msg?>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="card col s10 m10 l10" style="padding:2%;">
	<h4 style="padding-bottom:2%;">Ajouter une image : </h4>
	<?php
	
		echo form_open_multipart('formImgPage');
	?>
		<input type="file" name="fileImg"/>
		
		<button class="btn waves-effect waves-light right" type="submit" name="action" style="margin:2%;">
			Ajouter
			<i class="material-icons right">add</i>
		</button>
	<?php    
		echo form_close();
	?>
</div>