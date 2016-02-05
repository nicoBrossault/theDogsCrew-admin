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
	if(!$isAdmin){
		redirect('cUser', 'refresh');
	}
	if(isset($msgMdp)):?>
		<div class="row" style="margin-top: 2%; text-align:center; color:white">
			<div class="col s10 m10 offset-s1 offset-m1">
				<div class="card red darken-4">
					<?=$msgMdp?>
				</div>
			</div>
		</div>
<?php endif; ?>

<?php
	echo form_open('formUser');
	echo form_hidden('idUser',NULL);
?>
<label for="type"><h5>Type</h5></label>
<select id="type" name="type" style="display:block">
	<?php 
	foreach($types as $type): ?>
	<option value="<?=utf8_encode($type->getIdtype())?>">
		<?=utf8_encode($type->getLibelle())?>
	</option>
	<?php endforeach; ?>
</select>
<br>
<br>
<div class="row">
	<div class="input-field col s5">
	<?php
		$nom= array(
			'name'=>'nom',
			'id'=>'nom',
			'placeholder'=>'Nom',
			'value'=>'',
			'required'=>'required',
		);
		echo '<label for="nom"><h5>Nom</h5></label>';
		echo form_error('nom','<span class="error">','</span>');
		echo form_input($nom);
	?>	
	</div>
	<div class="input-field col s5">
	<?php
		$prenom= array(
				'name'=>'prenom',
				'id'=>'prenom',
				'placeholder'=>'Prénom',
				'value'=>'',
				'required'=>'required',
		);
		echo '<label for="prenom"><h5>Prénom</h5></label>';
		echo form_error('prenom','<span class="error">','</span>');
		echo form_input($prenom);
	?>
	</div>
</div>
<br>
<br>
<div class="row">
	<div class="input-field col s10">
	<label for="email" data-error="wrong" data-success="right"><h5>Email</h5></label>
	<?php	
		$mail= array(
				"class"=>"validate",
				'type'=>'email',
				'name'=>'email',
				'id'=>'email',
				'placeholder'=>'Email',
				'value'=>'',
				'required'=>'required',
		);
		echo form_error('mail','<span class="error">','</span>');
		echo form_input($mail);	
	?>
	</div>
</div>
<br>
<br>
<?php
$mdp1= array(
		'name'=>'mdp1',
		'id'=>'mdp1',
		'placeholder'=>'',
		'value'=>'',
		'required'=>'required',
);
echo '<label for="mdp1"><h5>Taper votre mot de passe</h5></label>';
echo form_error('mdp1','<span class="error">','</span>');
echo form_input($mdp1);


$mdp2= array(
		'name'=>'mdp2',
		'id'=>'mdp2',
		'placeholder'=>'',
		'value'=>'',
		'required'=>'required',
);
echo '<label for="mdp2"><h5>Retaper votre mot de passe</h5></label>';
echo form_error('mdp2','<span class="error">','</span>');
echo form_input($mdp2);
?>
<button class="btn waves-effect waves-light left" type="submit" name="action">
	Ajouter
	<i class="material-icons right">add</i>
</button>
<?php    
	echo form_close(); 
?>