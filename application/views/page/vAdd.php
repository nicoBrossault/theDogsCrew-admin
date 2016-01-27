<?php
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
?>
<script src="<?=base_url()?>assets/js/general.js"></script>
<?php

	echo form_open_multipart('form');
	
	echo form_hidden('idPage',NULL);
	
	echo form_hidden('idUser',$_SESSION['user']);
?>	
  
<label for="langue"><h5>Langue</h5></label>
<select id="langue" name="langue" style="display:block">
	<?php foreach($langues as $datalangue): ?>
	<option value="<?=utf8_encode($datalangue->getLangue())?>">
		<?=utf8_encode($datalangue->getLangue())?>
	</option>
	<?php endforeach; ?>
</select>

<label for="date"><h5>Date</h5></label>
<input type="date" name="date" value="" class="datepicker" />

<label for="fileImg"><h5>Ajouter une nouvelle Image : </h5></label>
<input type="file" name="fileImg"/>

<label for="existImg"><h5>Mettre une Image déjà téléchargé : </h5></label>
<select class="icons" id="existImg" name="existImg" style="display:block">
	<?php 
	$dir = '../theDogsCrew-site/imagesPage/';
	$fileImages = scandir($dir);
	$exist=false;
	foreach($fileImages as $fileImage):?>
	<option value="<?=$fileImage?>">
		<?=$fileImage?>
	</option>
	<?php endforeach; ?>
	<option value="NULL">Aucune Image</option>
</select>

<?php
	
	$titre= array('name'=>'titre','id'=>'titre','placeholder'=>'','value'=>'');
	echo '<label for="titre"><h5>Titre</h5></label>';
	echo form_input($titre);
	echo "<i>Minimum 5 caractère.</i>";
	
	$texte= array(
			'name'=>'texte',
			'id'=>'texte',
			'class'=>"materialize-textarea",
			'placeholder'=>'',
			'value'=>'',
			'cols' => '40','rows' => '40');
	echo '<label for="texte"><h5>Texte</h5></label>';
	echo form_textarea($texte);
	echo '<div id="legende"></div>';
	
	echo form_submit('envoi', 'Valider');     
	echo form_close();
?>