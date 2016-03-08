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
if($user->getIdtype()->getIdtype()==3):
	echo form_open('formArticleTemp');
else:
	echo form_open('formArticle');
endif;
echo form_hidden('idArticle',$article->getIdarticle()->getIdarticle());
echo form_hidden('idUser',$article->getIdusertemp()->getIduser());

$date = $article->getDatetemp()->format('Y-m-d');
?>	
  
<label for="langue"><h5>Langue</h5></label>
<select id="langue" name="langue" style="display:block">
	<?php 
	foreach($langues as $datalangue): ?>
	<option value="<?=utf8_encode($datalangue->getLangue())?>"
		<?php if(utf8_encode($article->getIdlanguetemp()->getlangue())==utf8_encode($datalangue->getLangue()))
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
<label for="page"><h5>Page</h5></label>
<select id="page" name="page" style="display:block">
	<option value="NULL"<?php if($article->getIdpagetemp()==NULL):?> selected <?php endif;?>>
		Aucune Page
	</option>
	
	<?php foreach($page as $dataPage): ?>
	<option value="<?=$dataPage->getIdpage()?>"
		<?php if($dataPage->getIdpage()==$article->getIdpagetemp())
		{echo "selected='selected'";}?>
	>
		<?=utf8_encode($dataPage->getIdlangue()->getLangue()).' : '.utf8_encode($dataPage->getTitre())?>
	</option>
	<?php endforeach; ?>
</select>
<div class="test"></div>
<br>
<br>
<br>
<br>

<label for="date"><h5>Date</h5></label>
<input type="date" name="date" id="date" placeholder"<?=$date?>" value="<?=$date?>" class="datepicker" />
<br>
<br>
<br>
<br>

<?php	
$titre= array('name'=>'titre',
		'id'=>'titre',
		'placeholder'=>'Titre de l\'article',
		'value'=>utf8_encode($article->getTitretemp()),
);
echo '<label for="titre"><h5>Titre</h5></label>';
echo form_input($titre);
echo "<i>Minimum 5 caractère.</i><br><br><br><br>";
?>
<label for="texte"><h5>Texte</h5></label>
<div class="row">
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
		'class'=>"materialize-textarea article",
		'placeholder'=>'Texte de l\'article',
		'value'=>utf8_encode($article->getTextetemp()),
		'cols' => '40',
		'rows' => '40'
);
echo form_textarea($texte);
echo '<div id="legende"></div>';

echo form_submit('envoi', 'Valider');     
echo form_close();
?>
<br>
<br>
<br>
<br>