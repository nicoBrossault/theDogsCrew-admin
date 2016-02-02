<footer>
	<div class="pied row center-block">
		<?php
			if(isset($_SESSION['langue'])){
	        $sql=$db->query("SELECT * FROM `textsite` WHERE `type` = 'footer' AND idLangue=".$_SESSION['langue']);
		        while ($data = $sql->fetch()){
		        	echo utf8_encode('<p>'.$data['text'].'</p>');
		    	}
			}
        ?>
	</div>
</footer>