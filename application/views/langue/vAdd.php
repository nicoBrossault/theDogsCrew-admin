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
<?php
foreach($langue as $data){
	echo form_open('form');
	
	echo form_hidden('idLangue',$data->getId());
	
	$nomLangue=$data->getLangue();
	$langue= array(
			'name'=>'langue',
			'id'=>'langue',
			'placeholder'=>'langue',
			'value'=>utf8_encode($nomLangue),
	);
	echo '<label for="langue"><h5>Langue</h5></label>';
	echo form_input($langue);
	
	echo form_submit('envoi', 'Valider');     
	echo form_close();
}  
?>