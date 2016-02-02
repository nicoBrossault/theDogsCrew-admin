<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Index extends CI_Controller {
	public function __construct(){
		 // Obligatoire
		 parent::__construct();
		 //the library "jsUtils" was load in : autoload.php
	}
 
	public function index(){		
		if(!isset($_SESSION['user'])){
			$this->layout->view('index/vConnexion');
		}else{
			$titre = "Index";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			$this->layout->view('index/vIndex');
		}
		
	}
	
	public function connexion(){
		//appel formulaire
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$isUser=false;
		$users = $this->doctrine->em->createQuery("SELECT u FROM user u")->getResult();
		$msg="";
		
		if(isset($_POST['mailUser'])){
			$this->form_validation
			->set_rules('mailUser', 'Nom d\'utilisateur', 'required', 'trim|required|min_length[5]|xss_clean');
			foreach($users as $user){
				if($user->getMail()==$_POST['mailUser']){
					$isUser=true;
					$idUser=$user->getIduser();
				}else{
					$msg="Mail invalide : ".$_POST['mailUser']."<br>";
					$isUser=false;
				}
			}
		}
		if(isset($_POST['mdp']) && $isUser){
			$this->form_validation
			->set_rules('mdp', 'Mot de passe', 'required', 'trim|required|xss_clean');
			
			$testUser=$this->doctrine->em->find('user',$idUser);
			
			if($testUser->getMdp()==sha1($_POST['mdp'])){
				$isUser=true;
			}else{
				$msg.="Mot de passe invalide";
				$isUser=false;
			}
		}
		
		if ($this->form_validation->run() == FALSE || !$isUser){
			$this->layout->view('index/vConnexion', array('msg'=>$msg));
		}else{
			$_SESSION['user']=$idUser;
			$this->index();
		}
	}
	
	function ajaxGet(){
	}
}
