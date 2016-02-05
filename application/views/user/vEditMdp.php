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