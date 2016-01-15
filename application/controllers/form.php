<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Form extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	function index(){
		$object=$_SESSION['object'];
		$titre=$object;
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		$this->load->helper('text');
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$lettreObj=$object[0];
		$objUse=$object." ".$lettreObj;
		
		//Recuperation de l'id
		//Recuperation du nom de l'objet
		$len=strlen($object);
		$subObj=substr($object,1,$len);
		$upperObj=strtoupper($lettreObj).$subObj;
		
		$id=$_POST['id'.$upperObj];
		
		//Recuperation de l'objet
		$query = $this->doctrine->em->createQuery(
			"SELECT ".$lettreObj." FROM ".$objUse." WHERE ".$lettreObj.".id".$object."=".$id);
		$queryObject = $query->getResult();
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view($object.'/vAdd',array(
					$object=>$queryObject,
			));
		}else{
			$this->load->view('formsuccess');
		}
	}
}
?>