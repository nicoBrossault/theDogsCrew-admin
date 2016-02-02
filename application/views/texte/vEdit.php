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
	echo form_hidden('idUser',$texte->getIduser()->getIduser());
	echo form_hidden('type',$texte->getType());
	
	$nomLangue=$texte->getIdlangue()->getLangue();
	$langue= array(
			'name'=>'langue',
			'id'=>'langue',
			'placeholder'=>'langue',
			'value'=>utf8_encode($nomLangue),
	);
	echo '<label for="langue"><h5>Langue</h5></label>';
	echo form_error('titre','<span class="error">','</span>');
	echo form_input($langue);
	
	echo form_hidden('type',$texte->getType());
	
	$libelle= array(
		'name'=>'libelle',
		'id'=>'libelle',
		'placeholder'=>utf8_encode($texte->getLibelle()),
		'value'=>utf8_encode($texte->getLibelle()),
	);
	echo '<label for="libelle"><h5>Libelle</h5></label>';
	echo form_error('titre','<span class="error">','</span>');
	echo form_input($libelle);
	
	$texte= array(
			'name'=>'texte',
			'id'=>'texte',
			'class'=>"materialize-textarea",
			'placeholder'=>$texte->getText(),
			'value'=>$texte->getText(),
			'cols' => '40',
			'rows' => '40',
	);
	echo '<label for="texte"><h5>Texte</h5></label>';
	echo form_error('titre','<span class="error">','</span>');
	echo form_textarea($texte);
	
	echo form_submit('envoi', 'Valider');     
	echo form_close(); 
?>