<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormArticleTemp extends CI_Controller {
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
		if(isset($_POST['idArticle']) && !empty($_POST['idArticle'])){
			$id=$_POST['idArticle'];
			//echo "id : ".$id."<br>";
			$this->form_validation->set_rules('idArticle', 'Id de l\'article', 'trim');
			$article = $this->doctrine->em->find('article', $id);
			
			$idArticleTemp=0;
			$allArticleTemp=$this->doctrine->em->getRepository('articletemp')->findAll();
			foreach($allArticleTemp as $articleTemp){
				if($articleTemp->getIdarticle()->getIdarticle()==$id){
					$idArticleTemp=$articleTemp->getIdarticleTemp();
				}
			}
			if($idArticleTemp!=0){
				$object = $this->doctrine->em->find('articletemp', $idArticleTemp);
			}else{
				$object=new Articletemp();
			}
			$idArticle=$this->doctrine->em->find('article',$_POST['idArticle']);
			$object->setIdarticle($idArticle);
		}
		
		if(isset($_POST['idUser']) && !empty($_POST['idUser'])){
			//echo "idUser : ".$_POST['idUser']."<br>";
			$idUser=$_POST['idUser'];
			$this->form_validation->set_rules('idUser', 'Id de l\'utilisateur', 'trim');

			$queryUser = $this->doctrine->em->createQuery(
						"SELECT u
						FROM user u
						WHERE u.iduser=".$idUser)->getResult();
			
			foreach($queryUser as $dataUser){
					$object->setIdusertemp($dataUser);
			}
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
					$object->setIdlanguetemp($dataLg);
				}
			}
		}
		if(isset($_POST['date']) && !empty($_POST['date'])){
			//echo "date : ".$_POST['date']."<br>";
			$this->form_validation->set_rules('date', 'Date', 'trim');
			$date = new DateTime($_POST['date']);
			$object->setDatetemp($date);
		}
		if(isset($_POST['titre']) && !empty($_POST['titre'])){
			//echo "titre : ".$_POST['titre']."<br>";
			$this->form_validation->set_rules('titre', 'Titre', 'trim|min_length[5]|xss_clean');
			$object->setTitretemp(utf8_decode($_POST['titre']));
		}
		if(isset($_POST['texte']) && !empty($_POST['texte'])){
			//echo "texte : ".$_POST['texte']."<br>";
			$this->form_validation->set_rules('texte', 'texte', 'trim|min_length[5]|max_length[301]|xss_clean');
			$object->setTextetemp(utf8_decode($_POST['texte']));
		}
		if(isset($_POST['page']) && !empty($_POST['page']) && $_POST['page']!="NULL"){
			//echo "page : ".$_POST['page']."<br>";
			$idPage=$_POST['page'];
			$this->form_validation->set_rules('page', 'Id de la page', 'trim');
			//Recuperation de l'objet dans la base;
			$page=$this->doctrine->em->find('page',$idPage);
			
			$object->setIdpagetemp($page->getIdpage());
		}
		if(isset($_POST['page']) && !empty($_POST['page']) && $_POST['page']=="NULL"){
			$this->form_validation->set_rules('page', 'Id de la page', 'trim');
			$object->setIdpagetemp(NULL);
		}
		
		if ($this->form_validation->run() == FALSE){
			//echo 'test false';
			$titre="Article";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			
			$object = $this->doctrine->em->find('article',$id);
			$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
			$this->load->view('article/vEdit',array(
								'article'	=>	$object,
								'langues'	=>	$langues,
								));
		}else{
			//echo 'test true';
			$this->doctrine->em->persist($object);
			$this->doctrine->em->flush();
			redirect('cArticle', 'refresh');
		}
	}
}
?>