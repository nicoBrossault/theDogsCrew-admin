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
	echo form_hidden('idText',NULL);
	echo form_hidden('idUser',$_SESSION['user']);
	echo form_hidden('type',$type);
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
	$libelle= array(
		'name'=>'libelle',
		'id'=>'libelle',
		'placeholder'=>'',
		'value'=>'',
		'required'=>'required',
	);
	echo '<label for="libelle"><h5>Libelle</h5></label>';
	echo form_input($libelle);
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
			'placeholder'=>'',
			'value'=>'',
			'cols' => '40',
			'rows' => '40',
	);
	echo form_textarea($texte);
	
	echo form_submit('envoi', 'Valider');     
	echo form_close(); 
?>