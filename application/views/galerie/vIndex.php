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

<div class="list">
	<ul class="collapsible popout" data-collapsible="accordion" style="box-shadow:none">
		<?php
			foreach($imgGaleries as $img):
		?>
		<li>
			<div class="collapsible-header">
				<img src="/theDogsCrew/theDogsCrew-site/<?=$img->getUrl()?>"
				style="min-width:50px; min-height:50px; max-width:50px; max-height:50px;border-radius: 50%;
				background-color : gray; margin-left:3%; margin-right:3%; margin-top:2%;">
				<label >Image <?=$img->getIdimage()?> : </label>
				<?=utf8_encode($img->getTitre())?>
			</div>
			<div class="collapsible-body white">
				<div class="row">
					<div class="col m10 s10 offset-m1 offset-s1" style="padding-top:3%; padding-bottom:3%">
						<label style="font-size:20px;">Identifiant : </label>
						<br>
						<?=$img->getIdimage()?>
						<br>
						<br>
						<label style="font-size:20px;">Contenu : </label>
						<br>
						<?=utf8_encode($img->getDescription())?>
						<br>
						<br>
						<label style="font-size:20px;">Image : </label>
						<br>
						<img src="/theDogsCrew/theDogsCrew-site/<?=$img->getUrl()?>" style="width:20%">
						<br>
						<br>
					</div>
				</div>
        
				<div class="fixed-action-btn horizontal" style="bottom: 45px; right:96px;">
					<a class="btn-floating btn-large red">
						<i class="large material-icons">mode_edit</i>
					</a>
					<ul>
						<li>
							<a class="btn-floating red modifier" id="<?=$img->getIdimage()?>">
								<i class="material-icons">mode_edit</i>
								<?=$img->getIdimage()?>
							</a>
						</li>
						<li>
							<a class="btn-floating yellow darken-1 supprimer" id="<?=$img->getIdimage()?>">
								<i class="material-icons">delete</i>
								<?=$img->getIdimage()?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</li>
		<?php endforeach; ?>	
	</ul>
</div>
<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
	<a id="<?=NULL?>"class="btn-floating btn-large waves-effect waves-light red addPage">
	  	<i class="material-icons">add</i>
	</a>
</div>
<br>
<?php
	echo "<br>".$this->pagination->create_links();
?>