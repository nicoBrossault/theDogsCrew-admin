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
foreach($comp as $data){
	echo form_open('form');
	
	echo form_hidden('idCompagnie',$data->getIdcompagnie());
	
	echo form_hidden('idUser',$data->getIduser());
	
	$nomLangue=$data->getIdlangue();
	$langue= array(
			'name'=>'langue',
			'id'=>'langue',
			'placeholder'=>'langue',
			'value'=>utf8_encode($nomLangue),
	);
	echo '<label for="langue"><h5>Langue</h5></label>';
	echo form_input($langue);
	
	$date = $data->getDate()->format('Y-m-d');
?>
	<label for="date"><h5>Date</h5></label>
	<input type="date" name="date" value="<?=$date?>" class="datepicker" />
<?php
	
	$titre= array(
		'name'=>'titre',
		'id'=>'titre',
		'placeholder'=>$data->getTitre(),
		'value'=>'',
	);
	echo '<label for="titre"><h5>Titre</h5></label>';
	echo form_input($titre);
	
	$texte= array(
			'name'=>'texte',
			'id'=>'texte',
			'class'=>"materialize-textarea",
			'placeholder'=>$data->getTexte(),
			'value'=>$data->getTexte(),
			'cols' => '40',
			'rows' => '40',
	);
	echo '<label for="texte"><h5>Texte</h5></label>';
	echo form_textarea($texte);
	
	echo form_submit('envoi', 'Valider');     
	echo form_close();
}  
?>