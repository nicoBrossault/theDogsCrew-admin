<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormGalerie extends CI_Controller {
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
		
		$msg="";
		
		if(isset($_POST['idGalerie']) && !empty($_POST['idGalerie'])){
			$id=$_POST['idGalerie'];
			//echo "id : ".$id."<br>";
			$this->form_validation->set_rules('idGalerie', 'Id de l\'image', 'trim');
			$object = $this->doctrine->em->find('image', $id);
		}else{
			$object = new Image();
		}
		if(isset($_POST['idUser']) && !empty($_POST['idUser'])){
			//echo "idUser : ".$_POST['idUser']."<br>";
			$idUser=$_POST['idUser'];
			$this->form_validation->set_rules('idUser', 'Id de l\'utilisateur', 'trim');
		
			$queryUser = $this->doctrine->em->find('user',$idUser);
			
			$object->setIduser($queryUser);
		}
		if(isset($_POST['titre']) && !empty($_POST['titre'])){
			//echo "titre : ".$_POST['titre']."<br>";
			$this->form_validation->set_rules('titre', 'Titre', 'trim|xss_clean');
			$object->setTitre(utf8_decode($_POST['titre']));
		}
		if(isset($_POST['texte']) && !empty($_POST['texte'])){
			//echo "texte : ".$_POST['texte']."<br>";
			$this->form_validation->set_rules('texte', 'texte', 'trim|xss_clean');
			$object->setDescription(utf8_decode($_POST['texte']));
		}
		
		if(isset($_FILES['fileImg']['name']) && !empty($_FILES['fileImg']['name'])){
			//echo $_FILES['fileImg']['name']."<br>";
			$addImage=$_FILES['fileImg']['name'];
			$dir= '../theDogsCrew-site/galerie/';
			$fileImages = scandir($dir);
			$exist=false;
			foreach($fileImages as $fileImage){
				if($fileImage==$addImage){
					$exist=true;
					$msg="L'image existe déjà !<br>";
				}
			}
			if(!$exist){
				$this->form_validation->set_rules('userfile', 'File', 'trim');
				$config['upload_path'] = '../theDogsCrew-site/galerie/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->set_allowed_types('*');
				$data['upload_data'] = '';
			
				if(!$this->upload->do_upload('fileImg')) {
					$msg=$this->upload->display_errors();
					$titre="Ajouter une image";
					$this->layout->set_titre($titre);
					$this->layout->th_default();
					$this->layout->view('galerie/vAdd', array('msg'=>$msg));
				}else{
					$data['upload_data'] = $this->upload->data();
					$msg = "Upload success!";
					$urlImg='galerie/'.$addImage;
					$object->setUrl($urlImg);
				}
			}
		}
		if($object->getUrl()==NULL){
			$this->form_validation->set_rules('userfile', 'File', 'trim|required');
			$msg="Aucune image sélectionnée...";
		}
		
		if ($this->form_validation->run() == FALSE){
			//echo 'test false';
			$titre="Ajouter une image";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			$this->layout->view('galerie/vAdd', array('msg'=>$msg));
		}else{
			//echo 'test true';
			$this->doctrine->em->persist($object);
			$this->doctrine->em->flush();
			redirect('cGalerie', 'refresh');
		}
	}
}
?>