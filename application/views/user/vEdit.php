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
		$user=$this->doctrine->em->find('user', $_SESSION['user']);
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
	echo form_hidden('idUser',$user->getIduser());
?>
<?php if($isAdmin): ?>
<label for="type"><h5>Type</h5></label>
<select id="type" name="type" style="display:block">
	<?php foreach($types as $type): ?>
		<option value="<?=utf8_encode($type->getIdtype())?>"
			<?php if(utf8_encode($user->getIdType()->getIdtype())==utf8_encode($type->getIdtype()))
			{echo "selected='selected'";}?>
		>
			<?=utf8_encode($type->getLibelle())?>
		</option>
	<?php endforeach; ?>
</select>
<?php endif; ?>
<br>
<br>
<div class="row">
	<div class="input-field col s5">
	<?php
		$nom= array(
			'name'=>'nom',
			'id'=>'nom',
			'placeholder'=>utf8_encode($user->getNom()),
			'value'=>utf8_encode($user->getNom()),
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
				'placeholder'=>utf8_encode($user->getPrenom()),
				'value'=>utf8_encode($user->getPrenom()),
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
				'placeholder'=>utf8_encode($user->getMail()),
				'value'=>utf8_encode($user->getMail()),
				'required'=>'required',
		);
		echo form_error('mail','<span class="error">','</span>');
		echo form_input($mail);	
	?>
	</div>
</div>
<br>
<br>
<div class="row editionMdp">
	<a class="btn waves-effect waves-light editMdp" id="<?=$user->getIduser()?>">
		Changer le mot de passe ?
		<i class="material-icons right">edit</i>
	</a>
</div>
<button class="btn waves-effect waves-light left" type="submit" name="action">
	Modifier
	<i class="material-icons right">edit</i>
</button>
<?php    
	echo form_close(); 
?>