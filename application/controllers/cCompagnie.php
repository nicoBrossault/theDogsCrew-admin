<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CCompagnie extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function index(){		
		$titre="Compagnie";
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		
		$this->load->helper('text');
		$this->ajaxGet();
		$queryNb = $this->doctrine->em->createQuery("SELECT c FROM compagnie c");
		$comps = $queryNb->getResult();
		
		$this->layout->view('compagnie/vIndex',array('comps'=>$comps));
	}
	
	public function add($id){
		$_SESSION['object']="Compagnie";
		$titre="Modifier/ Ajouter une page Compagnie :";
		
 		$queryNb = $this->doctrine->em->createQuery("SELECT c FROM compagnie c WHERE c.idcompagnie=".$id);
		$comp = $queryNb->getResult();
		
		$queryLng = $this->doctrine->em->createQuery("SELECT l FROM langue l");
		$langues = $queryLng->getResult();
		
		$this->layout->view('compagnie/vAdd', array(
						'titre'		=>	$titre,
						'comp'		=>	$comp,
						'langues'	=>	$langues,
						));
	}
	
	function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click','cCompagnie/add','#content');
		$this->jsutils->compile();
	}
}
