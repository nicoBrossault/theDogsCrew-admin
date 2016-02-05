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
	echo form_hidden('idText',$textNav->getIdlanguenavbar());
	
?>
<label for="langue"><h5>Langue</h5></label>
<select id="langue" name="langue" style="display:block">
	<?php foreach($langues as $datalangue):?>
	<option value="<?=utf8_encode($datalangue->getLangue())?>"
		<?php if(utf8_encode($this->doctrine->em->find('langue',$textNav->getIdlangue())->getLangue())==utf8_encode($datalangue->getLangue()))
		{echo "selected='selected'";}?>
	>
		<?=utf8_encode($datalangue->getLangue())?>
	</option>
	<?php endforeach; ?>
</select>
<?php
	
	$textNav=explode("-",$textNav->getTexte());
	
	$plus= array(
			'name'=>'plus',
			'id'=>'plus',
			'placeholder'=>$textNav[0],
			'value'=>$textNav[0],
			'required'=>'required'
	);
	echo '<label for="plus"><h5>Texte pour "Plus" :</h5></label>';
	echo form_input($plus);
	
	$accueil= array(
			'name'=>'accueil',
			'id'=>'accueil',
			'placeholder'=>$textNav[1],
			'value'=>$textNav[1],
			'required'=>'required'
	);
	echo '<label for="accueil"><h5>Texte pour "Accueil" :</h5></label>';
	echo form_input($accueil);
	
	$compagnie= array(
			'name'=>'compagnie',
			'id'=>'compagnie',
			'placeholder'=>$textNav[2],
			'value'=>$textNav[2],
			'required'=>'required'
	);
	echo '<label for="compagnie"><h5>Texte pour "Compagnie" :</h5></label>';
	echo form_input($compagnie);
	
	$article= array(
			'name'=>'article',
			'id'=>'article',
			'placeholder'=>$textNav[3],
			'value'=>$textNav[3],
			'required'=>'required'
	);
	echo '<label for="article"><h5>Texte pour "Article" :</h5></label>';
	echo form_input($article);
	
	$galerie= array(
			'name'=>'galerie',
			'id'=>'galerie',
			'placeholder'=>$textNav[4],
			'value'=>$textNav[4],
			'required'=>'required'
	);
	echo '<label for="galerie"><h5>Texte pour "Galerie" :</h5></label>';
	echo form_input($galerie);
	
	$contact= array(
			'name'=>'contact',
			'id'=>'contact',
			'placeholder'=>$textNav[5],
			'value'=>$textNav[5],
			'required'=>'required'
	);
	echo '<label for="contact"><h5>Texte pour "Contact" :</h5></label>';
	echo form_input($contact);
	
	echo form_submit('envoi', 'Valider');     
	echo form_close(); 
?>