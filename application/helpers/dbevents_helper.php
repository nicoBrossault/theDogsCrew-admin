<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function isEmpty($nameObject, $id, $champ){
		$ci = get_instance();
		$lettreObj=$nameObject[0];
		$objUse=$nameObject." ".$lettreObj;
		
		//Recuperation de l'id
		//Recuperation du nom de l'objet
		$len=strlen($nameObject);
		$subObj=substr($nameObject,1,$len);
		$upperObj=strtoupper($lettreObj).$subObj;
		
		//Recuperation de l'objet dans la base;
		$query = $ci->doctrine->em->createQuery(
				"SELECT ".$lettreObj.".".$champ.
				" FROM ".$objUse.
				" WHERE ".$lettreObj.".id".$nameObject."=".$id);
		$queryObject = $query->getResult();
		
		foreach($queryObject as $data){
			$value=$data[$champ];
		}
		return $value;
	}
?>
