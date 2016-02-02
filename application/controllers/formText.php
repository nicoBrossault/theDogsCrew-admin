<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormText extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}

	function index(){
		$this->load->helper('text');
		$this->load->helper('security');
		
		//appel formulaire
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		//Regle de validation
		//appel de l'object
		if(isset($_POST['idText']) && !empty($_POST['idText'])){
			$id=$_POST['idText'];
			//echo "id : ".$id."<br>";
			$this->form_validation->set_rules('idTexte', 'Id du texte', 'trim');
			$object = $this->doctrine->em->find('textsite', $id);
		}else{
			$object = new Textsite();
		}		
		if(isset($_POST['idUser']) && !empty($_POST['idUser'])){
			//echo "idUser : ".$_POST['idUser']."<br>";
			$idUser=$_POST['idUser'];
			$this->form_validation->set_rules('idUser', 'Id de l\'utilisateur', 'trim');

			$queryUser = $this->doctrine->em->find('user',$idUser);
			
			$object->setIduser($queryUser);
		}
		if(isset($_POST['type']) && !empty($_POST['type'])){
			//echo "type : ".$_POST['type']."<br>";
			$idUser=$_POST['type'];
			$this->form_validation->set_rules('type', 'Type du texte', 'trim');
				
			$object->setIduser($queryUser);
		}
		if(isset($_POST['langue']) && !empty($_POST['langue'])){
			//echo "Recup : ".$_POST['langue']."<br>";
			$postLangue=$_POST['langue'];
			$this->form_validation->set_rules('langue', 'Id de la langue', 'trim');

			//Recuperation de l'objet dans la base;
			$langue=$this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();

			foreach($langue as $dataLg){
				$test=utf8_encode($dataLg->getLangue());
				//echo "Test : ".$test." = ".$postLangue."<br>";
				if($test==$postLangue){
					//echo "-> this : ".$test." = OK <br>";
					$object->setIdlangue($dataLg);
				}
			}
		}
		if(isset($_POST['libelle']) && !empty($_POST['libelle'])){
			//echo "titre : ".$_POST['libelle']."<br>";
			$this->form_validation->set_rules('libelle', 'Libelle du texte', 'trim|min_length[5]|xss_clean');
			$object->setLibelle(utf8_decode($_POST['libelle']));
		}
		if(isset($_POST['texte']) && !empty($_POST['texte'])){
			//echo "texte : ".$_POST['texte']."<br>";
			$this->form_validation->set_rules('texte', 'texte', 'trim|min_length[5]|xss_clean');
			$object->setText(utf8_decode($_POST['texte']));
		}
		
		if ($this->form_validation->run() == FALSE){
			//echo 'test false';
			$titre="Texte du site";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			
			if(isset($id)){
				$object = $this->doctrine->em->find('textsite',$id);
				$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
				$this->load->view('texte/vEdit',array(
									'texte'	=>	$object,
									'langues'	=>	$langues,
									));
			}else{
				$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
				$this->load->view('texte/vAdd',array(
								'texte'	=>	$object,
								'langues'	=>	$langues,
								));
			}
		}else{
			//echo 'test true';
			$this->doctrine->em->persist($object);
			$this->doctrine->em->flush();
			redirect('cTexte', 'refresh');
		}
	}
}
?>