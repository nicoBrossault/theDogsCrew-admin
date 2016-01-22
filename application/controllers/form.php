<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}

	function index(){
		$this->load->helper('text');
		$this->load->helper('security');
		$nameObject=$_SESSION['object'];
		
		//theme
		$titre=$nameObject;
		$this->layout->set_titre($titre);
		$this->layout->th_default();

		$lettreObj=$nameObject[0];
		$objUse=$nameObject." ".$lettreObj;
		
		//Recuperation du nom de l'objet
		$len=strlen($nameObject);
		$subObj=substr($nameObject,1,$len);
		$upperObj=strtoupper($lettreObj).$subObj;
		
		//appel formulaire
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		//Regle de validation
		//appel de l'object
		if(isset($_POST['id'.$upperObj])){
			$id=$_POST['id'.$upperObj];
			//echo $id."<br>";
			$this->form_validation->set_rules('idArticle', 'Id de l\'article', 'trim');
			$object = $this->doctrine->em->find($upperObj, $id);
		}else{
			$object = new $upperObj();
		}		
		if(isset($_POST['idUser']) && !empty($_POST['idUser'])){
			//echo $_POST['idUser']."<br>";
			$idUser=$_POST['idUser'];
			$this->form_validation->set_rules('idUser', 'Id de l\'utilisateur', 'trim');

			$queryUser = $this->doctrine->em->createQuery(
						"SELECT u
						FROM user u
						WHERE u.iduser=".$idUser)->getResult();

			foreach($queryUser as $dataUser){
					$object->setIduser($dataUser);
			}
		}
		if(isset($_POST['langue']) && !empty($_POST['langue'])){
			//echo "Recup : ".$_POST['langue']."<br>";
			$postLangue=$_POST['langue'];
			$this->form_validation->set_rules('langue', 'Id de la langue', 'trim');

			//Recuperation de l'objet dans la base;
			$langue=$this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();

			foreach($langue as $data){
				$test=utf8_encode($data->getLangue());
				//echo "Test : ".$test." = ".$postLangue."<br>";
				if($test==$postLangue){
					//echo "-> this : ".$test." = OK <br>";
					$object->setIdlangue($data);
				}
			}
		}
		if(isset($_POST['date']) && !empty($_POST['date'])){
			//echo $_POST['date']."<br>";
			$this->form_validation->set_rules('date', 'Date', 'trim');
			$date = new DateTime($_POST['date']);
			$object->setDate($date);
		}
		if(isset($_POST['titre']) && !empty($_POST['titre'])){
			//echo $_POST['titre']."<br>";
			$this->form_validation->set_rules('titre', 'Titre', 'trim|min_length[5]|max_length[12]|xss_clean');
			$object->setTitre($_POST['titre']);
		}
		if(isset($_POST['texte']) && !empty($_POST['texte'])){
			//echo $_POST['texte']."<br>";
			$this->form_validation->set_rules('texte', 'texte', 'trim|min_length[5]|xss_clean');
			$object->setTexte($_POST['texte']);
		}
		if(isset($_POST['page']) && !empty($_POST['page'])){
			//echo $_POST['page']."<br>";
			$idPage=$_POST['page'];
			$this->form_validation->set_rules('page', 'Id de la page', 'trim');
			//Recuperation de l'objet dans la base;
			$page=$this->doctrine->em->createQuery("SELECT p.idpage FROM page p WHERE p.idpage=".$idPage)->getResult();
			
			foreach($page as $dataPage){
				$object->setIdpage($dataPage['idpage']);
				
			}
		}
		
		if ($this->form_validation->run() == FALSE){
			//echo 'test false';
			$object = $this->doctrine->em->createQuery(
						"SELECT ".$lettreObj.
						" FROM ".$objUse.
						" WHERE ".$lettreObj.".id".$nameObject."=".$id)->getResult();
			$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
			$this->load->view($nameObject.'/vAdd',array(
								$nameObject	=>	$object,
								'langues'	=>	$langues,
								));
		}else{
			//echo 'test true';
			$this->doctrine->em->persist($object);
			$this->doctrine->em->flush();
			redirect('c'.$upperObj, 'refresh');
		}
	}
}
?>