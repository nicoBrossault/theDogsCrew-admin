<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormUser extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}

	function index(){
		$isValid=False;
		$this->jsutils->getAndBindTo('.editMdp','click','cUser/editMdp','.editionMdp');
		$this->jsutils->compile();
		
		$this->load->helper('text');
		$this->load->helper('security');
		
		//appel formulaire
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		//Regle de validation
		//appel de l'object
		if(isset($_POST['idUser']) && !empty($_POST['idUser'])){
			//echo "id user : ".$_POST['idUser']."<br>";
			$id=$_POST['idUser'];
			$object = $this->doctrine->em->find('user', $id);
			$isValid=True;
		}else{
			$object = new User();
			$isValid=True;
		}
		if(isset($_POST['type']) && !empty($_POST['type']) && $isValid==True){
			//echo "type : ".$_POST['type']."<br>";
			$idUser=$_POST['type'];
			$this->form_validation->set_rules('type', 'Type du texte', 'trim');
			$type=$this->doctrine->em->find('usertype',$_POST['type']);
			$object->setIdtype($type);
			$isValid=True;
		}
		if(isset($_POST['nom']) && !empty($_POST['nom']) && $isValid==True){
			//echo "titre : ".$_POST['nom']."<br>";
			$this->form_validation->set_rules('nom', 'Nom de l\'utlisateur', 'trim|xss_clean');
			$object->setNom(utf8_decode($_POST['nom']));
			$isValid=True;
		}
		if(isset($_POST['prenom']) && !empty($_POST['prenom']) && $isValid==True){
			//echo "texte : ".$_POST['prenom']."<br>";
			$this->form_validation->set_rules('prenom', 'Prenom de l\'utlisateur', 'trim|xss_clean');
			$object->setPrenom(utf8_decode($_POST['prenom']));
			$isValid=True;
		}
		if(isset($_POST['email']) && !empty($_POST['email']) && $isValid==True){
			//echo "texte : ".$_POST['email']."<br>";
			$this->form_validation->set_rules('email', 'Email de l\'utlisateur', 'trim|xss_clean');
			$object->setMail($_POST['email']);
			$isValid=True;
		}
		if(isset($_POST['mdp1']) && !empty($_POST['mdp1'])){
			//echo "texte : ".$_POST['mdp1']."<br>";
			$this->form_validation->set_rules('mdp1', 'Email de l\'utlisateur', 'trim|xss_clean');
			$isValid=True;
		}
		if(isset($_POST['mdp2']) && !empty($_POST['mdp2']) && $isValid==True){
			if($_POST['mdp1']==$_POST['mdp2']){
				//echo "texte : ".$_POST['mdp2']."<br>";
				$this->form_validation->set_rules('mdp2', 'Email de l\'utlisateur', 'trim|xss_clean');
				$mdps=$this->doctrine->em->getRepository('mdpSalt')->findAll();
				foreach($mdps as $mdp){
					$sel1=$mdp->getSel1();
					$sel2=$mdp->getSel2();
				}
				$mdpComplet=$sel1.sha1($_POST['mdp2']).$sel2;
				$object->setMdp($mdpComplet);
				$isValid=True;
			}else{
				$isValid=False;
				$msgMdp="Les deux Mots de Passe ne sont pas identique";
			}
		}
		if ($this->form_validation->run() == FALSE){
			//echo 'test false';
			$titre="Utilisateur";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			
			if(isset($id)){
				$object = $this->doctrine->em->find('user',$id);
				$this->load->view('user/vEdit',array(
									'user'	=>	$object,
									));
			}else{
				$this->load->view('user/vAdd');
			}
		}else{
			if($isValid==true){
				//echo 'test true';
				$this->doctrine->em->persist($object);
				$this->doctrine->em->flush();
				redirect('cUser', 'refresh');
			}else{
				$titre="Utilisateur";
				$this->layout->set_titre($titre);
				$this->layout->th_default();
					
				if(isset($id)){
					$object = $this->doctrine->em->find('user',$id);
					$this->load->view('user/vEdit',array(
							'user'		=>	$object,
							'msgMdp'	=>	$msgMdp,
					));
				}else{
					$this->load->view('user/vAdd',array(
							'msgMdp'	=>	$msgMdp,
					));
				}
			}
		}
	}
}
?>