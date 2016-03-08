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
	echo form_open_multipart('formCompTemp');
	echo form_hidden('idcompagnie',$comp->getIdcompagnie()->getIdcompagnie());	
	echo form_hidden('idUser',$comp->getIduser()->getIduser());
	$date = $comp->getDate()->format('Y-m-d');
?>
<label for="langue"><h5>Langue</h5></label>
<select id="langue" name="langue" style="display:block">
	<?php foreach($langues as $datalangue):?>
	<option value="<?=utf8_encode($datalangue->getLangue())?>"
		<?php if(utf8_encode($comp->getIdlangue()->getLangue())==utf8_encode($datalangue->getLangue()))
		{echo "selected='selected'";}?>
	>
		<?=utf8_encode($datalangue->getLangue())?>
	</option>
	<?php endforeach; ?>
</select>
<br>
<br>
<br>
<br>

<label for="date"><h5>Date</h5></label>
<input type="date" name="date" value="<?=$date?>" class="datepicker" />
<br>
<br>
<br>
<br>

<label for="fileImg"><h5>Ajouter une nouvelle Image : </h5></label>
<input type="file" name="fileImg"/>
<br>
<br>
<br>
<br>

<label for="existImg"><h5>Mettre une Image déjà téléchargé : </h5></label>
<select class="icons" id="existImg" name="existImg" style="display:block">
	<?php 
	$dir = '../theDogsCrew-site/imagesPage/';
	$fileImages = scandir($dir);
	$exist=false;
	
	if($comp->getImagetemp()){
		$nomImg=explode('/',$comp->getImagetemp());
		$nomImg=$nomImg[1];
	}else{
		$nomImg=NULL;
	}
		
	foreach($fileImages as $fileImage){
		$count+=1;
	}
	for($i=2; $i<$count; $i++):
	?>
	<option value="<?=$fileImages[$i]?>"<?php if($fileImages[$i]==$nomImg):?> selected <?php endif;?>>
		<?=$fileImages[$i]?>
	</option>
	<?php endfor; ?>
	<option value="NULL" <?php if($nomImg==NULL):?> selected <?php endif;?>>Aucune Image</option>
</select>
<br>
<br>
<br>
<br>

<?php	
	$titre= array('name'=>'titre','id'=>'titre','placeholder'=>utf8_encode($comp->getTitretemp()),'value'=>$comp->getTitretemp(),);
	echo '<label for="titre"><h5>Titre</h5></label>';
	echo form_error('titre','<span class="error">','</span>');
	echo form_input($titre);
	echo "<i>Minimum 5 caractère.</i><br><br><br><br><br>";
?>
<label for="texte"><h5>Texte</h5></label>
<div class="row">
	<div class="func col s1 m1 l1 btn waves-effect waves-light " id='p' style="margin-left: 5px;">
		<div class="tooltipped" data-position="top" data-delay="50" data-tooltip="Nouveau paragraphe : écrire entre les balises">		
			<i class="material-icons">format_textdirection_l_to_r</i>
		</div>
	</div>
	<div class="func col s1 m1 l1 btn waves-effect waves-light" id='u' style="margin-left: 5px;">
		<div class="tooltipped" data-position="top" data-delay="50" data-tooltip="Souligne : écrire entre les balises">
			<i class="material-icons">format_underlined</i>
		</div>
	</div>
	<div class="func col col s1 m1 l1 btn waves-effect waves-light" id='i' style="margin-left: 5px;">
		<div class="tooltipped" data-position="top" data-delay="50" data-tooltip="Met en Italique : écrire entre les balises">
			<i class="material-icons">format_italic</i>
		</div>
	</div>
	<div class="func col col s1 m1 l1 btn waves-effect waves-light" id='b' style="margin-left: 5px;">
		<div class="tooltipped" data-position="top" data-delay="50" data-tooltip="Met en Gras : écrire entre les balises">
			<i class="material-icons">format_bold</i>
		</div>
	</div>
	<div class="func col col s1 m1 l1 btn waves-effect waves-light upLine" id='br' style="margin-left: 5px;">
		<div class="tooltipped" data-position="top" data-delay="50" data-tooltip="Saut de ligne : Ne pas écrire entre les balises">
			<i class="material-icons">wrap_text</i>
		</div>
	</div>
	<div class="func col col s1 m1 l1 btn waves-effect waves-light clearText" style="margin-left: 5px;">
		<div class="tooltipped" data-position="top" data-delay="50" data-tooltip="Supprime tout le texte">
			<i class="material-icons">format_clear</i>
		</div>
	</div>
</div>
<?php
	$texte= array(
			'name'=>'texte',
			'id'=>'texte',
			'class'=>"materialize-textarea",
			'placeholder'=>utf8_encode($comp->getTextetemp()),
			'value'=>utf8_encode($comp->getTextetemp()),
			'cols' => '40','rows' => '40');
	echo form_error('texte','<span class="error">','</span>');
	echo form_textarea($texte);
	echo '<div id="legende"></div>';
	
	echo form_submit('envoi', 'Valider');     
	echo form_close();
?>
<br>
<br>
<br>
<br>