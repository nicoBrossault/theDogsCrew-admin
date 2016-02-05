<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CCompagnie extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function thereIsLayout(){
		if(!isset($layout)){
			$titre="Compagnie";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		}
	}
	
	public function index($id=1){
		if(!isset($_SESSION['user'])){
			$this->layout->view('index/vConnexion');
		}else{
			$titre="Compagnie";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		
			$this->ajaxGet();
			$user=$this->doctrine->em->find('user',$_SESSION['user']);
			if($user->getIdtype()->getIdtype()==1){
				$comps=$this->doctrine->em->createQuery("SELECT c FROM compagnie c WHERE c.iduser=".$_SESSION['user']);
			}else{
				$comps=$this->doctrine->em->getRepository('compagnie')->findAll();
			}
			$this->layout->view("compagnie/vIndex",array('comps'=>$comps, 'user'=>$user));
		}
	}
	
	public function add($id=NULL){
		$this->thereIsLayout();
		$titre="Modifier/ Ajouter une page Compagnie :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		if($id==NULL){
			$this->layout->view('compagnie/vAdd', array(
					'titre'		=>	$titre,
					'langues'	=>	$langues,
			));
		}else{
			//auteur page
			$authorComp=$this->doctrine->em->find('compagnie', $id)->getIduser()->getIdUser();
			$author=$this->doctrine->em->find('user', $_SESSION['user'])->getIdUser();
			$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
			if($authorPage==$author || $type==1 || $type==3){
				$comp = $this->doctrine->em->find('compagnie',$id);
				$this->layout->view('compagnie/vEdit', array(
						'titre'		=>	$titre,
						'langues'	=>	$langues,
						'comp'		=>	$comp,
				));
			}else{
				redirect('cCompagnie','refresh');
			}
		}
	}
	
	public function supprimer($id){
		$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if($type!=3){
			$comp=$this->doctrine->em->find('compagnie',$id);
			$this->jsutils->getAndBindTo('.delete','click',base_url().'cCompagnie/validDelete','#content');
			$this->jsutils->compile();
			$this->layout->view('compagnie/vDelete', array(
					'id'	=>	$id,
					'comp'	=>	$comp,
			));
		}else{
			redirect('cCompagnie','refresh');
		}
	}
	
	public function validDelete($id){
		$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if($type!=3){
			$comp=$this->doctrine->em->find('compagnie',$id);
			$this->doctrine->em->remove($comp);
			$this->doctrine->em->flush();
		
			$msg='La page : "'.$comp->getTitre().'" a bien été supprimé.';
			$this->layout->view('compagnie/vDelete', array(
					'msg'	=>	$msg,
					'comp'	=>	$comp,
			));
		}else{
			redirect('cCompagnie','refresh');
		}
	}
	
	public function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click',base_url().'cCompagnie/add','body');
		$this->jsutils->getAndBindTo('.addPage','click',base_url().'cCompagnie/add','body');
		$this->jsutils->getAndBindTo('.supprimer','click',base_url().'cCompagnie/supprimer','#content');
		$this->jsutils->compile();
	}
}
