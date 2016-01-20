<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function isEmpty($object, $id, $champ){
		$ci = get_instance();
		$lettreObj=$object[0];
		$objUse=$object." ".$lettreObj;
		
		//Recuperation de l'id
		//Recuperation du nom de l'objet
		$len=strlen($object);
		$subObj=substr($object,1,$len);
		$upperObj=strtoupper($lettreObj).$subObj;
		
		//Recuperation de l'objet dans la base;
		$query = $ci->doctrine->em->createQuery(
				"SELECT ".$lettreObj.".".$champ.
				" FROM ".$objUse.
				" WHERE ".$lettreObj.".id".$object."=".$id);
		$queryObject = $query->getResult();
		
		foreach($queryObject as $data){
			$value=$data[$champ];
		}
		return $value;
	}
?>
