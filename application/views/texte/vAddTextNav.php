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
	echo form_open('formTextNav');
	echo form_hidden('idText',NULL);
?>
<label for="langue"><h5>Langue</h5></label>
<select id="langue" name="langue" style="display:block">
	<?php foreach($langues as $datalangue): ?>
	<option value="<?=utf8_encode($datalangue->getLangue())?>">
		<?=utf8_encode($datalangue->getLangue())?>
	</option>
	<?php endforeach; ?>
</select>
<?php	
	$plus= array(
			'name'=>'plus',
			'id'=>'plus',
			'placeholder'=>'',
			'value'=>'',
			'required'=>'required'
	);
	echo '<label for="plus"><h5>Texte pour "Plus" :</h5></label>';
	echo form_input($plus);
	
	$accueil= array(
			'name'=>'accueil',
			'id'=>'accueil',
			'placeholder'=>'',
			'value'=>'',
			'required'=>'required'
	);
	echo '<label for="accueil"><h5>Texte pour "Accueil" :</h5></label>';
	echo form_input($accueil);
	
	$compagnie= array(
			'name'=>'compagnie',
			'id'=>'compagnie',
			'placeholder'=>'',
			'value'=>'',
			'required'=>'required'
	);
	echo '<label for="compagnie"><h5>Texte pour "Compagnie" :</h5></label>';
	echo form_input($compagnie);
	
	$article= array(
			'name'=>'article',
			'id'=>'article',
			'placeholder'=>'',
			'value'=>'',
			'required'=>'required'
	);
	echo '<label for="article"><h5>Texte pour "Article" :</h5></label>';
	echo form_input($article);
	
	$galerie= array(
			'name'=>'galerie',
			'id'=>'galerie',
			'placeholder'=>'',
			'value'=>'',
			'required'=>'required'
	);
	echo '<label for="galerie"><h5>Texte pour "Galerie" :</h5></label>';
	echo form_input($galerie);
	
	$contact= array(
			'name'=>'contact',
			'id'=>'contact',
			'placeholder'=>'',
			'value'=>'',
			'required'=>'required'
	);
	echo '<label for="contact"><h5>Texte pour "Contact" :</h5></label>';
	echo form_input($contact);
	
	echo form_submit('envoi', 'Valider');     
	echo form_close(); 
?>