<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CTexte extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
		$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if($type!=1){
			redirect('index','refresh');
		}
	}
	
	public function thereIsLayout(){
		if(!isset($layout)){
			$titre="Texte";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		}
	}
	
	public function index(){
		$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if(!isset($_SESSION['user'])){
			$this->layout->view('index/vConnexion');
		}else{
			$titre="Texte";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			$this->ajaxGet();
			
			$types = $this->doctrine->em->getRepository('textsite')->findAll();
			
			$this->layout->view('texte/vIndex',array('types'=>$types));
		}
	}
	
	public function listText($type){
		$_SESSION['typeText']=$type;
		$this->thereIsLayout();
		$this->load->helper('text');
		$this->ajaxGet();
		$typeUser=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if($type=="textNav"){
			$textNav = $this->doctrine->em->getRepository('languenavbar')->findAll();
			$this->layout->view('texte/vListTextNav', array(
					'textNav'	=>	$textNav,
			));			
		}else{
			$textes = $this->doctrine->em->createQuery("SELECT t FROM textsite t WHERE t.type='".$type."'")->getResult();
			$this->layout->view('texte/vList', array(
							'textes'	=>	$textes,
							));
		}
	}
	
	public function add($id=NULL){
		$this->thereIsLayout();
		$titre="Modifier/ Ajouter un texte :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		
		if($id==NULL){
			$this->layout->view('texte/vAdd', array(
					'titre'		=>	$titre,
					'langues'	=>	$langues,
			));
		}else{
			$texte=$this->doctrine->em->find('textsite',$id);
			$this->layout->view('texte/vEdit', array(
					'titre'		=>	$titre,
					'texte'		=>	$texte,
					'langues'	=>	$langues,
			));
		}
	}
	
	public function addTextNav($id=NULL){
		$this->thereIsLayout();
		$titre="Modifier/ Ajouter la NavBar :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		if($id==NULL){
			$this->layout->view('texte/vAddTextNav', array(
					'titre'		=>	$titre,
					'langues'	=>	$langues,
			));
		}else{
			$textNav=$this->doctrine->em->find('languenavbar',$id);
			$this->layout->view('texte/vEditTextNav', array(
					'titre'		=>	$titre,
					'textNav'	=>	$textNav,
					'langues'	=>	$langues,
			));
		}
	}
	
	public function supprimer($id){
		$texte=$this->doctrine->em->find('textsite',$id);
		$this->jsutils->getAndBindTo('.delete','click',base_url().'cTexte/validDelete','#content');
		$this->jsutils->compile();
		$this->layout->view('texte/vDelete', array(
				'id'		=>	$id,
				'texte'		=>	$texte,
		));
	}
	
	public function validDelete($id){
		$texte=$this->doctrine->em->find('textsite',$id);
		$this->doctrine->em->remove($texte);
		$this->doctrine->em->flush();
	
		$msg='Le Texte : "'.$texte->getLibelle().'" a bien été supprimé.';
		$this->layout->view('texte/vDelete', array(
				'msg'		=>	$msg,
				'texte'		=>	$texte,
		));
	}
	
	public function supprimerTextNav($id){
		$textNav=$this->doctrine->em->find('languenavbar',$id);
		$this->jsutils->getAndBindTo('.delete','click',base_url().'cTexte/validDeleteTextNav','#content');
		$this->jsutils->compile();
		$this->layout->view('texte/vDeleteTextNav', array(
				'id'		=>	$id,
				'textNav'	=>	$textNav,
		));
	}
	
	public function validDeleteTextNav($id){
		$textNav=$this->doctrine->em->find('languenavbar',$id);
		$this->doctrine->em->remove($textNav);
		$this->doctrine->em->flush();
	
		$this->jsutils->getAndBindTo('.delete','click','cTexte/validDeleteTextNav','#content');
		$this->jsutils->compile();
	
		$msg='Le Texte de la NavBar en "'.utf8_encode($textNav->getIdlangue()->getLangue()).'" a bien été supprimé.';
		$this->layout->view('texte/vDeleteTextNav', array(
				'msg'		=>	$msg,
				'textNav'		=>	$textNav,
		));
	}
	
	function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click','cTexte/add','body');
		$this->jsutils->getAndBindTo('.addPage','click','cTexte/add','body');
		$this->jsutils->getAndBindTo('.supprimer','click','cTexte/supprimer','#content');
		
		$this->jsutils->getAndBindTo('.modifierTextNav','click','cTexte/addTextNav','body');
		$this->jsutils->getAndBindTo('.addTextNav','click','cTexte/addTextNav','body');
		$this->jsutils->getAndBindTo('.supprimerTextNav','click','cTexte/supprimerTextNav','#content');
		
		$this->jsutils->getAndBindTo('.type','click','cTexte/listText','body');
		$this->jsutils->getAndBindTo('.textNav','click','cTexte/listText','body');
		$this->jsutils->compile();
	}
}