<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CTexte extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function index(){		
		$titre="Texte";
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		$this->ajaxGet();
		
		$types = $this->doctrine->em->getRepository('textsite')->findAll();
		
		$this->layout->view('texte/vIndex',array('types'=>$types));
	}
	
	public function listText($type){
		$this->load->helper('text');
		$this->ajaxGet();
		
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
	
	public function add($id){
		$_SESSION['object']="textsite";
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
	
	public function addTextNav($id){
		$_SESSION['object']="languenavbar";
		$titre="Modifier/ Ajouter la NavBar :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		if($id==NULL){
			$this->layout->view('article/vAdd', array(
					'titre'		=>	$titre,
					'langues'	=>	$langues,
			));
		}else{
			$textNav=$this->doctrine->em->find('languenavbar',$id);
			$this->layout->view('texte/vEditTextNav', array(
					'titre'		=>	$titre,
					'textNav'		=>	$textNav,
					'langues'	=>	$langues,
			));
		}
	}
	
	function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click','cTexte/add','#content');
		$this->jsutils->getAndBindTo('.modifierTextNav','click','cTexte/addTextNav','#content');
		$this->jsutils->getAndBindTo('.type','click','cTexte/listText','#content');
		$this->jsutils->getAndBindTo('.textNav','click','cTexte/listText','#content');
		$this->jsutils->compile();
	}
}