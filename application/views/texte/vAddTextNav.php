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
	echo form_open('formText');
	echo form_hidden('idText',$texte->getIdtext());
	
	$nomLangue=utf8_encode($this->doctrine->em->find('langue',$texte->getIdlangue())->getLangue());
	$langue= array(
			'name'=>'langue',
			'id'=>'langue',
			'placeholder'=>'langue',
			'value'=>utf8_encode($nomLangue),
	);
	echo '<label for="langue"><h5>Langue</h5></label>';
	echo form_input($langue);
	
	$texte= array(
			'name'=>'texte',
			'id'=>'texte',
			'class'=>"materialize-textarea",
			'placeholder'=>$textNav->getTexte(),
			'value'=>$textNav->getTexte(),
			'cols' => '40',
			'rows' => '40',
	);
	echo '<label for="texte"><h5>Texte</h5></label>';
	echo form_textarea($texte);
	
	echo form_submit('envoi', 'Valider');     
	echo form_close(); 
?>