<?php
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
use Doctrine\ORM\Query\AST\Functions\SubstringFunction;
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

<?php if(isset($msg)):?>
	<div class="row" style="margin-top: 2%; text-align:center; color:white">
		<div class="col s10 m6 offset-s1 offset-m3">
			<div class="card red darken-4">
				<?=$msg?>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="card col s10 m10 l10 offset-s1 offset-m1 offset-l1" style="padding:2%;">
	<h4 style="padding-bottom:2%;">Ajouter une image : </h4>
	<?php	
		echo form_open_multipart('formGalerie');
		echo form_hidden('idGalerie',NULL);
		echo form_hidden('idUser',$_SESSION['user']);
	?>
	<input type="file" name="fileImg"/>
	<br>
	<br>
	<br>
	<br>
	<?php 
		$titre= array(
				'name'=>'titre',
				'id'=>'titre',
				'placeholder'=>'Titre de l\'image',
				'value'=>'',
				'required'=>'required',
				);
		echo '<label for="titre"><h5>Titre</h5></label>';
		echo form_error('titre','<span class="error">','</span>');
		echo form_input($titre);
		echo "<i>Minimum 5 caractère.</i><br><br><br><br><br>";
	?>
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
			'placeholder'=>'Le texte de l\'image',
			'value'=> '',
			'required'=>'required',
			'cols' => '40',
			'rows' => '40',
	);
	echo '<label for="texte"><h5>Texte</h5></label>';
	echo form_error('texte','<span class="error" style="color:red">','</span>');
	echo form_textarea($texte);
?>		
		<button class="btn waves-effect waves-light right" type="submit" name="action" style="margin:2%;">
			Ajouter
			<i class="material-icons right">add</i>
		</button>
	<?php    
		echo form_close();
	?>
</div>