<?php
	print_r($articles);
	if(empty($articles)){
		echo "vide";
	}
	foreach ($articles as $article){
		echo($article->getTexte()."<br>");
	}
?>