<?php use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;?>
<!DOCTYPE html>
	<head>
		<title>Administration</title>
		<meta charset="UTF-8">
		<!--Import Google Icon Font-->
		      	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
				<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	</head>
	<body>
		<?php if(isset($msg)):?>
			<div class="row" style="margin-top: 2%; text-align:center; color:white">
				<div class="col s10 m6 offset-s1 offset-m3">
					<div class="card red darken-4">
						<?=$msg?>
					</div>
				</div>
			</div>
		<?php endif; ?>
            
		
		<div class="row" style="margin-top: 2%;">
			<div class="col s8 m4 offset-s2 offset-m4">
				<div class="card hoverable">
					<div class="card-title teal darken-1 white-text" style="text-align:center; padding:2%">
						<b>Connexion</b>
					</div>
					<div class="card-content">
						<?php
							echo form_open(base_url('index')."/connexion");

							$mailUser= array('name'=>'mailUser','id'=>'mailUser', 'placeholder'=>'Mail', 'value'=>'');
							echo '<label for="mailUser"><h5>Login</h5></label>';
							echo form_input($mailUser);
							
							$mdp= array('name'=>'mdp','id'=>'mdp','placeholder'=>'Mot de passe', 'value'=>'');
							echo '<label for="mdp"><h5>Mot de Passe</h5></label>';
							echo form_password($mdp);
						?>
							<button class="btn waves-effect waves-light" type="submit" name="valiser">
								Submit
								<i class="material-icons right">send</i>
							</button> 
						
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>