<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormLangue extends CI_Controller {
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
		if(isset($_POST['idLangue']) && !empty($_POST['idLangue'])){
			$id=$_POST['idLangue'];
			//echo "id : ".$id."<br>";
			$this->form_validation->set_rules('idLangue', 'Id dle la langue', 'trim');
			$object = $this->doctrine->em->find('langue', $id);
		}else{
			$object = new Langue();
		}
		if(isset($_POST['langue']) && !empty($_POST['langue'])){
			//echo "texte : ".$_POST['texte']."<br>";
			$this->form_validation->set_rules('langue', 'texte de la langue', 'trim|xss_clean');
			$object->setLangue(utf8_decode($_POST['langue']));
		}
		
		if ($this->form_validation->run() == FALSE){
			//echo 'test false';
			$titre="Langue";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			
			if(isset($id)){
				$object = $this->doctrine->em->find('langue',$id);
				$this->load->view('langue/vEdit',array(
									'titre'		=>	$titre,
									'langue'	=>	$object,
									));
			}else{
				$this->load->view('langue/vAdd',array(
								'texte'	=>	$object,
								));
			}
		}else{
			//echo 'test true';
			$this->doctrine->em->persist($object);
			$this->doctrine->em->flush();
			redirect('cLangue', 'refresh');
		}
	}
}
?>