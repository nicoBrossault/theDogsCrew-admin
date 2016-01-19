<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function update($object, $id, $champ, $value){
		$ci = get_instance();
		
		//Recupere le nom de la fonction
		$lettreChamp=$champ[0];
		$len=strlen($champ);
		$subChamp=substr($champ,1,$len);
		$champ=strtoupper($lettreChamp).$subChamp;
		$set = 'set'.$champ;
		
		//Recuperation du nom de l'objet
		$lettreObj=$object[0];
		$len=strlen($object);
		$subObj=substr($object,1,$len);
		$upperObj=strtoupper($lettreObj).$subObj;
		
		$object = new $upperObj();
		$object->$set($value);
		$ci->doctrine->em->persist($object);
		$ci->doctrine->em->flush();
	}
	
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
		
		//Recupere le nom de la fonction
		/*$lettreChamp=$champ[0];
		$len=strlen($champ);
		$subChamp=substr($champ,1,$len);
		$champ=strtoupper($lettreChamp).$subChamp;
		$get = 'get'.$champ;*/
		
		print_r($queryObject);
		foreach($queryObject as $data){
			print_r($data);
			$value=$data->$get();
		}
		return $value;
	}
?>
