<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CLangue extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function index(){		
		$titre="Langue";
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		
		$this->load->helper('text');
		$this->ajaxGet();
		$queryNb = $this->doctrine->em->createQuery("SELECT l FROM langue l");
		$langues = $queryNb->getResult();
		
		$this->layout->view('langue/vIndex',array('langues'=>$langues));
	}
	
	public function add($id){
		$_SESSION['object']="Langue";
		$titre="Modifier/ Ajouter Langue :";
		
 		$queryNb = $this->doctrine->em->createQuery("SELECT l FROM langue l WHERE l.id=".$id);
		$langue = $queryNb->getResult();
		
		$this->layout->view('langue/vAdd', array(
						'titre'		=>	$titre,
						'langue'	=>	$langue,
						));
	}
	
	function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click','cLangue/add','#content');
		$this->jsutils->compile();
	}
}
