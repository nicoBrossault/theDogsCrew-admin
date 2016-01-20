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
<div class="col s5 m6" style="color:black">
	<div class="card hoverable">
		<div class="card-content">
			<span class="card-title"><?=$type?></span>
			<p>Cliquez pour modifier les texte de type : <?=$type?></p>
		</div>
	</div>
</div>
</a>

<?php endforeach ?>            