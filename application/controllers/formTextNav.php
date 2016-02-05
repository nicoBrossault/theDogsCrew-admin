<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormTextNav extends CI_Controller {
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
			$object = $this->doctrine->em->find('languenavbar', $id);
		}else{
			$object = new Languenavbar();
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
					$object->setIdlangue($dataLg->getId());
				}
			}
		}
		if(isset($_POST['plus']) && !empty($_POST['plus'])){
			//echo "plus : ".$_POST['plus']."<br>";
			$this->form_validation->set_rules('plus', 'bouton plus', 'trim|min_length[1]|xss_clean');
			$textNav=$_POST['plus'].'-';
		}
		if(isset($_POST['accueil']) && !empty($_POST['accueil'])){
			//echo "accueil : ".$_POST['accueil']."<br>";
			$this->form_validation->set_rules('accueil', 'bouton accueil', 'trim|min_length[1]|xss_clean');
			$textNav.=$_POST['accueil'].'-';
		}
		if(isset($_POST['compagnie']) && !empty($_POST['compagnie'])){
			//echo "compagnie : ".$_POST['compagnie']."<br>";
			$this->form_validation->set_rules('compagnie', 'bouton compagnie', 'trim|min_length[1]|xss_clean');
			$textNav.=$_POST['compagnie'].'-';
		}
		if(isset($_POST['article']) && !empty($_POST['article'])){
			//echo "article : ".$_POST['article']."<br>";
			$this->form_validation->set_rules('article', 'bouton article', 'trim|min_length[1]|xss_clean');
			$textNav.=$_POST['article'].'-';
		}
		if(isset($_POST['galerie']) && !empty($_POST['galerie'])){
			//echo "galerie : ".$_POST['galerie']."<br>";
			$this->form_validation->set_rules('galerie', 'bouton galerie', 'trim|min_length[1]|xss_clean');
			$textNav.=$_POST['galerie'].'-';
		}
		if(isset($_POST['contact']) && !empty($_POST['contact'])){
			//echo "contact : ".$_POST['contact']."<br>";
			$this->form_validation->set_rules('contact', 'bouton contact', 'trim|min_length[1]|xss_clean');
			$textNav.=$_POST['contact'];
		}
		
		if ($this->form_validation->run() == FALSE){
			//echo 'test false';
			$titre="Texte du site";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			
			if(isset($id)){
				$object = $this->doctrine->em->find('textsite',$id);
				$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
				$this->load->view('texte/vEditTextNav',array(
									'texte'	=>	$object,
									'langues'	=>	$langues,
									));
			}else{
				$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
				$this->load->view('texte/vAddTextNav',array(
								//'texte'	=>	$object,
								'langues'	=>	$langues,
								));
			}
		}else{
			//echo 'test true';
			$object->setTexte($textNav);
			$this->doctrine->em->persist($object);
			$this->doctrine->em->flush();
			redirect('cTexte', 'refresh');
		}
	}
}
?>