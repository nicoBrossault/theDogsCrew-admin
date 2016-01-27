<?php
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
?>
<script src="<?=base_url()?>assets/js/general.js"></script>
<?php

foreach($page as $data){
	echo form_open_multipart('form');
	
	echo form_hidden('idPage',$data->getIdpage());
	
	echo form_hidden('idUser',$data->getIduser()->getIduser());
	
	$date = $data->getDate()->format('Y-m-d');
?>	
  
<label for="langue"><h5>Langue</h5></label>
<select id="langue" name="langue" style="display:block">
	<?php foreach($langues as $datalangue): ?>
	<option value="<?=utf8_encode($datalangue->getLangue())?>"
		<?php if(utf8_encode($data->getIdlangue()->getlangue())==utf8_encode($datalangue->getLangue()))
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
	foreach($fileImages as $fileImage):
		if($data->getImage()){
			$nomImg=explode('/',$data->getImage());
			$nomImg=$nomImg[1];
		}else{
			$nomImg=NULL;
		}
	?>
	<option value="<?=$fileImage?>"<?php if($fileImage==$nomImg):?> selected<?php endif;?>>
		<?=$fileImage?>
	</option>
	<?php endforeach; ?>
	<option value="NULL">Aucune Image</option>
</select>
<br>
<br>
<br>
<br>


<?php
	
	$titre= array('name'=>'titre','id'=>'titre','placeholder'=>$data->getTitre(),'value'=>$data->getTitre(),);
	echo '<label for="titre"><h5>Titre</h5></label>';
	echo form_input($titre);
	echo "<i>Minimum 5 caractère.</i><br><br><br><br><br>";
	
	$texte= array(
			'name'=>'texte',
			'id'=>'texte',
			'class'=>"materialize-textarea",
			'placeholder'=>utf8_encode($data->getTexte()),
			'value'=>utf8_encode($data->getTexte()),
			'cols' => '40','rows' => '40');
	echo '<label for="texte"><h5>Texte</h5></label>';
	echo form_textarea($texte);
	echo '<div id="legende"></div>';
	
	echo form_submit('envoi', 'Valider');     
	echo form_close();
}
?>