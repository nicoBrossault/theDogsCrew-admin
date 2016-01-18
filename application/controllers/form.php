<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Form extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	function index(){
		$object=$_SESSION['object'];
		
		$lettreObj=$object[0];
		$objUse=$object." ".$lettreObj;
		
		//Recuperation de l'id
		//Recuperation du nom de l'objet
		$len=strlen($object);
		$subObj=substr($object,1,$len);
		$upperObj=strtoupper($lettreObj).$subObj;
		
		$id=$_POST['id'.$upperObj];
		
		//Recuperation de l'objet dans la base;
		$query = $this->doctrine->em->createQuery(
				"SELECT ".$lettreObj." FROM ".$objUse." WHERE ".$lettreObj.".id".$object."=".$id);
		$queryObject = $query->getResult();
		
		$titre=$object;
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		$this->load->helper('text');
		$this->load->helper('security');
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//Regle de validation
		if(isset($_POST[$id])){
			$this->form_validation->set_rules('idArticle', 'Id de l\'article', 'trim');
			
		}
		if(isset($_POST['idUser'])){
			$this->form_validation->set_rules('idUser', 'Id de l\'utilisateur', 'trim');
		}
		if(isset($_POST['langue'])){
			$this->form_validation->set_rules('langue', 'Id de la langue', 'trim');
		}
		if(isset($_POST['date'])){
			$this->form_validation->set_rules('date', 'Date', 'trim');
		}
		if(isset($_POST['titre'])){					
			$this->form_validation->set_rules('titre', 'Titre', 'trim|min_length[5]|max_length[12]|xss_clean');
			if(empty($_POST['titre'])){
				$_POST['titre']=isEmpty($object,$id,'titre');
			}
			update($object,$id,'titre',$_POST['titre']);
		}
		if(isset($_POST['texte'])){
			$this->form_validation->set_rules('texte', 'texte', 'trim|min_length[5]|max_length[300]|xss_clean');
			update($object,$id,'texte',$_POST['texte']);
		}
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view($object.'/vAdd',array(
					$object=>$queryObject,
			));
		}else{
			redirect('c'.$upperObj, 'refresh');
		}
	}
}
?>