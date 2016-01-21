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
		/*if(isset($id)){
			echo $id."<br>";
			$this->form_validation->set_rules('idArticle', 'Id de l\'article', 'trim');
			$set='setId'.$nameObject;
			$object->$set($id);
		}*/
		if(isset($_POST['idUser'])){
			echo $_POST['idUser']."<br>";
			$this->form_validation->set_rules('idUser', 'Id de l\'utilisateur', 'trim');
			$object->setIduser($object->getIduser());
		}
		if(isset($_POST['langue'])){
			echo $_POST['langue']."<br>";
			$postLangue=$_POST['langue'];
			$this->form_validation->set_rules('langue', 'Id de la langue', 'trim');
			$langue=$this->doctrine->em->createQuery("SELECT l
													FROM langue l")->getResult();
			$langueObj = new Langue();
			foreach($langue as $data){
				$test=utf8_encode($data->getLangue());
				if($test==$postLangue){
					$idLangue=$data->getId();
				}
			}
			$object->setIdlangue($langueObj->getId($idLangue));
		}
		if(isset($_POST['date'])){
			echo $_POST['date']."<br>";
			$this->form_validation->set_rules('date', 'Date', 'trim');
			$object->setDate($_POST['date']);
		}
		if(isset($_POST['titre'])){		
			$this->form_validation->set_rules('titre', 'Titre', 'trim|min_length[5]|max_length[12]|xss_clean');
			if(empty($_POST['titre'])){
				$value=isEmpty($nameObject,$id,'titre');
				echo $value."<br>";
				$object->setTitre($value);
			}else{
				echo $_POST['titre']."<br>";
				$object->setTitre($_POST['titre']);
			}
		}
		if(isset($_POST['texte'])){
			echo $_POST['texte']."<br>";
			$this->form_validation->set_rules('texte', 'texte', 'trim|min_length[5]|max_length[300]|xss_clean');
			$object->setTexte($_POST['texte']);
		}
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view($nameObject.'/vAdd',array(
					$nameObject=>$queryObject,
			));
		}else{
			$this->doctrine->em->persist($object);
			$this->doctrine->em->flush();
			redirect('c'.$upperObj, 'refresh');
		}
	}
}
?>