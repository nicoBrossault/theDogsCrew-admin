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
foreach($texte as $data){
	echo form_open('form');
	
	echo form_hidden('idText',$data->getIdtext());
	
	echo form_hidden('idUser',$data->getIduser()->getIduser());
	
	$nomLangue=$data->getIdlangue()->getLangue();
	$langue= array(
			'name'=>'langue',
			'id'=>'langue',
			'placeholder'=>'langue',
			'value'=>utf8_encode($nomLangue),
	);
	echo '<label for="langue"><h5>Langue</h5></label>';
	echo form_input($langue);
	
	echo form_hidden('type',$data->getType());
	
	$titre= array(
		'name'=>'titre',
		'id'=>'titre',
		'placeholder'=>utf8_encode($data->getLibelle()),
		'value'=>'',
	);
	echo '<label for="titre"><h5>Titre</h5></label>';
	echo form_input($titre);
	
	$texte= array(
			'name'=>'texte',
			'id'=>'texte',
			'class'=>"materialize-textarea",
			'placeholder'=>$data->getText(),
			'value'=>$data->getText(),
			'cols' => '40',
			'rows' => '40',
	);
	echo '<label for="texte"><h5>Texte</h5></label>';
	echo form_textarea($texte);
	
	echo form_submit('envoi', 'Valider');     
	echo form_close();
}  
?>