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
foreach($article as $data){
	echo form_open('form');
	
	echo form_hidden('idArticle',$data->getIdarticle());
	
	echo form_hidden('idUser',$data->getIduser()->getIduser());
	
	$date = $data->getDate()->format('Y-m-d');
?>	
  
<label for="langue"><h5>Langue</h5></label>
<select id="langue" name="langue" style="display:block">
	<?php foreach($langues as $datalangue): ?>
	<option value="<?=utf8_encode($optionLangue[]=$datalangue->getLangue())?>"
		<?php if(utf8_encode($data->getIdlangue()->getlangue())==utf8_encode($datalangue->getLangue()))
		{echo "selected='selected'";}?>
	>
		<?=utf8_encode($optionLangue[]=$datalangue->getLangue())?>
	</option>
	<?php endforeach; ?>
</select>

<label for="date"><h5>Date</h5></label>
<input type="date" name="date" id="date" placeholder"<?=$date?>" value="" class="datepicker" />

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
			'value'=>'',
			'cols' => '40',
			'rows' => '40',
	);
	echo '<label for="texte"><h5>Texte</h5></label>';
	echo form_textarea($texte);
	echo '<div id="legende"></div>';
	
	echo form_submit('envoi', 'Valider');     
	echo form_close();
}
?>