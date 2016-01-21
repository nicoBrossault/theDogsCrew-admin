<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Form extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	function index(){
		$nameObject=$_SESSION['object'];
		
		$lettreObj=$nameObject[0];
		$objUse=$nameObject." ".$lettreObj;
		
		//Recuperation de l'id
		//Recuperation du nom de l'objet
		$len=strlen($nameObject);
		$subObj=substr($nameObject,1,$len);
		$upperObj=strtoupper($lettreObj).$subObj;
		
		$id=$_POST['id'.$upperObj];
		
		//theme
		$titre=$nameObject;
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		$this->load->helper('text');
		$this->load->helper('security');
		
		//appel de l'object
		$object = new $upperObj();
		//appel formulaire
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//Regle de validation
		if(isset($id)){
			$this->form_validation->set_rules('idArticle', 'Id de l\'article', 'trim');
			$set='setId'.$nameObject;
			$object->$set($id);
		}
		if(isset($_POST['idUser'])){
			$idUser=$_POST['idUser'];
			$this->form_validation->set_rules('idUser', 'Id de l\'utilisateur', 'trim');
			
			$queryUser = $this->doctrine->em->createQuery(
						"SELECT u 
						FROM user u 
						WHERE u.iduser=".$idUser)->getResult();
			
			
			foreach($queryUser as $dataUser){
					$object->setIduser($dataUser->getIduser());
					echo $object->getIduser()->getIduser();
			}
		}
		
		if(isset($_POST['langue'])){
			$postLangue=$_POST['langue'];
			$this->form_validation->set_rules('langue', 'Id de la langue', 'trim');
			
			//Recuperation de l'objet dans la base;
			$langue=$this->doctrine->em->createQuery(
					"SELECT l FROM langue l")->getResult();
			
			foreach($langue as $data){
				$test=utf8_encode($data->getLangue());
				if($test==$postLangue){
					$object->setIdlangue($data->getId());
					echo $object->getIdlangue();
				}
			}
		}
		
		if(isset($_POST['date'])){
			$this->form_validation->set_rules('date', 'Date', 'trim');
			$date = new DateTime($_POST['date']);
			$object->setDate($date);
		}
		if(isset($_POST['titre'])){		
			$this->form_validation->set_rules('titre', 'Titre', 'trim|min_length[5]|max_length[12]|xss_clean');
			if(empty($_POST['titre'])){
				$value=isEmpty($nameObject,$id,'titre');
				$object->setTitre($value);
			}else{
				$object->setTitre($_POST['titre']);
			}
		}
		if(isset($_POST['texte'])){
			$this->form_validation->set_rules('texte', 'texte', 'trim|min_length[5]|max_length[300]|xss_clean');
			$object->setTexte($_POST['texte']);
		}
		
		/*if ($this->form_validation->run() == FALSE){
			$this->load->view($nameObject.'/vAdd',array(
					$nameObject=>$queryObject,
			));
		}else{
			$this->doctrine->em->persist($object);
			$this->doctrine->em->flush();
			redirect('c'.$upperObj, 'refresh');
		}*/
	}
}
?>