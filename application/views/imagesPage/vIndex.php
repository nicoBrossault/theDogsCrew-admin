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
	<div class="card col s10 m10 l10">
		<h4 style="padding:2%;">Les Images des Pages :</h4>
		<ul>
			<?php
				echo form_open('formImgPage');
				for($i=2; $i<$count; $i++):
			?>
			<li style="border: solid 1px #DDDDDD; padding: 1%">
				<img src="/theDogsCrew/theDogsCrew-site/imagesPage/<?=$imagesP[$i]?>"
				style="min-width:50px; min-height:50px; max-width:50px; max-height:50px;border-radius: 50%;
				background-color : gray; margin-left:3%;">
				<br>
				<input type="checkbox" id="image<?=$i?>" name="imgP[]" value="<?=$imagesP[$i]?>"/>
				<label for="image<?=$i?>" style="color:black"><?=$imagesP[$i]?></label>
			</li>		
			<?php endfor; ?>
		</ul>
		<button class="btn waves-effect waves-light right" type="submit" name="action" style="margin:2%;">
			Supprimer
			<i class="material-icons right">delete</i>
		</button>
		<?php    
			echo form_close();
		?>
		<button class="btn waves-effect waves-light right ajoutImgP" style="margin:2%;">
			Ajouter
			<i class="material-icons right">add</i>
		</button>
	</div>
</div>
<br>