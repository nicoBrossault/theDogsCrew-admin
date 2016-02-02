<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CCompagnie extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function index($id=1){
		$titre="Compagnie";
		$this->layout->set_titre($titre);
		$this->layout->th_default();
	
		$this->ajaxGet();
	
		$comps=$this->get_Page($id, '10');
		$this->layout->view("compagnie/vIndex",array('comps'=>$comps));
	}
	
	public function add($id=NULL){
		$_SESSION['object']="compagnie";
		$titre="Modifier/ Ajouter une page Compagnie :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		if($id==NULL){
			$this->layout->view('compagnie/vAdd', array(
					'titre'		=>	$titre,
					'langues'	=>	$langues,
			));
		}else{
			$comp = $this->doctrine->em->createQuery("SELECT c FROM compagnie c WHERE c.idcompagnie=".$id)->getResult();
			$this->layout->view('compagnie/vEdit', array(
					'titre'		=>	$titre,
					'langues'	=>	$langues,
					'comp'		=>	$comp,
			));
		}
	}
	
	function get_Page($page,$per_page){
		$min = (($page)*$per_page)-($per_page);
		$num = $min + $per_page;
		 
		return $this->doctrine->em->createQuery(
				"SELECT c
    			FROM compagnie c
    			WHERE c.idcompagnie >".$min." AND c.idcompagnie <=".$num
				)->getResult();
	}
	
	public function supprimer($id){
		$comp = $this->doctrine->em->createQuery("SELECT c FROM compagnie c WHERE c.idcompagnie =".$id)->getResult();
		$this->jsutils->getAndBindTo('.delete','click',base_url().'cCompagnie/validDelete','#content');
		$this->jsutils->compile();
		$this->layout->view('compagnie/vDelete', array(
				'id'	=>	$id,
				'comp'	=>	$comp,
		));
	}
	
	public function validDelete($id){
		$comp=$this->doctrine->em->find('compagnie',$id);
		$this->doctrine->em->remove($comp);
		$this->doctrine->em->flush();
	
		$this->jsutils->getAndBindTo('.delete','click',base_url().'cCompagnie/validDelete','#content');
		$this->jsutils->compile();
	
		$msg='La page : "'.$comp->getTitre().'" a bien été supprimé.';
		$this->layout->view('compagnie/vDelete', array(
				'msg'	=>	$msg,
				'comp'	=>	$comp,
		));
	}
	
	public function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click',base_url().'cCompagnie/add','#content');
		$this->jsutils->getAndBindTo('.addPage','click',base_url().'cCompagnie/add','#content');
		$this->jsutils->getAndBindTo('.supprimer','click',base_url().'cCompagnie/supprimer','#content');
		$this->jsutils->compile();
	}
}
