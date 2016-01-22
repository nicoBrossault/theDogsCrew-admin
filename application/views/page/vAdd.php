<?php
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;

foreach($page as $data){
	echo form_open('form');
	
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

<label for="date"><h5>Date</h5></label>
<input type="date" name="date" id="date" placeholder"<?=$date?>" value="<?=$date?>" class="datepicker" />

<?php
	
	$titre= array('name'=>'titre','id'=>'titre','placeholder'=>$data->getTitre(),'value'=>$data->getTitre(),);
	echo '<label for="titre"><h5>Titre</h5></label>';
	echo form_input($titre);
	echo "<i>Minimum 5 caractère.</i>";
	
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