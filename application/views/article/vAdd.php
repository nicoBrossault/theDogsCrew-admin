<?php
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;

foreach($article as $data){
	echo form_open('form');
	
	echo form_hidden('idArticle',$data->getIdarticle());
	
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

<label for="page"><h5>Page</h5></label>
<select id="page" name="page" style="display:block">
	<option value="NULL"<?php if($data->getIdpage()==NULL):?> selected <?php endif;?>>
		Aucune Page
	</option>
	
	<?php foreach($pages as $dataPage): ?>
	<option value="<?=$dataPage->getIdpage()?>"
		<?php if($dataPage->getIdpage()==$data->getIdpage())
		{echo "selected='selected'";}?>
	>
		<?=utf8_encode($dataPage->getTitre())?>
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
	
	$texte= array('name'=>'texte','id'=>'texte','class'=>"materialize-textarea",'placeholder'=>$data->getTexte(),'value'=>$data->getTexte(),'cols' => '40','rows' => '40');
	echo '<label for="texte"><h5>Texte</h5></label>';
	echo form_textarea($texte);
	echo '<div id="legende"></div>';
	
	echo form_submit('envoi', 'Valider');     
	echo form_close();
}
?>