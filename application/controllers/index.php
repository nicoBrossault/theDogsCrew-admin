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
			
			$user=$this->doctrine->em->find("user",$_SESSION['user']);
			
			$articlesTemp=$this->doctrine->em->getRepository('articletemp')->findAll();
			$countA=0;
			$msgArticle=array();
			foreach($articlesTemp as $articleTemp){
				$countA+=1;
				$msgArticle[]=$this->doctrine->em->find('articletemp', $articleTemp->getIdarticletemp());
			}
			
			$pagesTemp=$this->doctrine->em->getRepository('pagetemp')->findAll();
			$countP=0;
			$msgPage=array();
			foreach($pagesTemp as $pageTemp){
				$countP+=1;
				$msgPage[]=$this->doctrine->em->find('pagetemp', $pageTemp->getIdpagetemp());
			}
			
			$compsTemp=$this->doctrine->em->getRepository('compagnietemp')->findAll();
			$countC=0;
			$msgComp=array();
			foreach($compsTemp as $compTemp){
				$countC+=1;
				$msgComp[]=$this->doctrine->em->find('compagnietemp', $compTemp->getIdcompagnietemp());
			}
			
			$this->layout->view('index/vIndex', array(
					'msgArticle'=>	$msgArticle,
					'msgPage'	=>	$msgPage,
					'msgComp'	=>	$msgComp,
					'user'		=>	$user));
		}
		
	}
	
	public function connexion(){
		//appel formulaire
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$isUser=false;
		$users = $this->doctrine->em->getRepository("user")->findAll();
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
		if(isset($_POST['mdp']) && isset($isUser) && isset($idUser)){
			$this->form_validation
			->set_rules('mdp', 'Mot de passe', 'required', 'trim|required|xss_clean');
			
			$mdps=$this->doctrine->em->getRepository('mdpSalt')->findAll();
			foreach($mdps as $mdp){
				$selR=$mdp->getSaltr();
				$selL=$mdp->getSaltl();
			}
			$testUser=$this->doctrine->em->find('user',$idUser);
			$mdpComplet=$selR.sha1($_POST['mdp']).$selL;
			//$mdpComplet=sha1($_POST['mdp']);
			if($testUser->getMdp()==$mdpComplet){
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
	
	function disconnect(){
		session_destroy();
		redirect('index','refresh');
	}
	
	function ajaxGet(){
	}
}
