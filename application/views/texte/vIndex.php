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

<?php
	$len=0;
	$allType=array();
	foreach ($types as $type){
		$test=false;
		$var=$type->getType();
		for($i=0;$i<count($allType);$i++){
			if($var == $allType[$i]){
				$test=true;
			}		
		}
		if($test==false){
			$allType[]=$var;
		}
	}
	foreach($allType as $type):
?>

<a class="type" id="<?=$type?>">
<div class="col s10 m6" style="color:black; min-height:180px;">
	<div class="card hoverable">
		<div class="card-content">
			<span class="card-title"><?=$type?></span>
			<p>Cliquez pour modifier les texte de type : <?=$type?></p>
		</div>
	</div>
</div>
</a>

<?php endforeach ?>

<a class="textNav" id="textNav">
	<div class="col s10 m6 offset-s1 offset-m3" style="color:black; min-height:180px;">
		<div class="card hoverable">
			<div class="card-content">
				<span class="card-title">Les textes de la NavBar </span>
				<p>Cliquez pour modifier les textes de la NavBar</p>
			</div>
		</div>
	</div>
</a>
            