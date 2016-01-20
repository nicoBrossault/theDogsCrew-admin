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
		
		$queryNb = $this->doctrine->em->createQuery("SELECT t FROM textsite t");
		$types = $queryNb->getResult();
		
		$this->layout->view('texte/vIndex',array('types'=>$types));
	}
	
	public function listText($type){
		$this->load->helper('text');
		$this->ajaxGet();
		
		$queryNb = $this->doctrine->em->createQuery("SELECT t FROM textsite t WHERE t.type='".$type."'");
		$textes = $queryNb->getResult();
		
		$this->layout->view('texte/vList', array(
						'textes'	=>	$textes,
						));
	}
	
	public function add($id){
		$_SESSION['object']="Textsite";
		$titre="Modifier un texte :";
		
 		$queryNb = $this->doctrine->em->createQuery("SELECT t FROM textsite t WHERE t.idtext=".$id);
		$texte = $queryNb->getResult();
		
		$queryLng = $this->doctrine->em->createQuery("SELECT l FROM langue l");
		$langues = $queryLng->getResult();
		
		$this->layout->view('texte/vAdd', array(
						'titre'		=>	$titre,
						'texte'		=>	$texte,
						'langues'	=>	$langues,
						));
	}
	
	function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click','cTexte/add','#content');
		$this->jsutils->getAndBindTo('.type','click','cTexte/listText','#content');
		$this->jsutils->compile();
	}
}