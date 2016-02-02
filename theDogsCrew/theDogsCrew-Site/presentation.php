<?php
	if(isset($_SESSION['langue'])):
?>
	<div class="presentation">
        <div class="contient-text center-block">
		<?php 
			$sql=$db->query("SELECT * FROM `textsite` WHERE `type`='presentation' AND idLangue=".$_SESSION['langue']);
	        while ($data = $sql->fetch()){
	          echo utf8_encode('<h1 style="font-size:30px;">'.$data['libelle'].'</h1><p>'.$data['text'].'</p>');
	        }
		?>
		</div>
	</div>
<?php endif ?>