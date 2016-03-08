<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CLangue extends CI_Controller {
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
			$titre="Langue";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		}
	}
	
	public function index(){
		if(!isset($_SESSION['user'])){
			$this->layout->view('index/vConnexion');
		}else{
			$titre="Langue";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			$this->ajaxGet();
			
			$langues = $this->doctrine->em->getRepository('langue')->findAll();
			
			$this->layout->view('langue/vIndex',array('langues'=>$langues));
		}
	}
	
	public function add($id=NULL){
		$this->thereIsLayout();
		$titre="Modifier/Ajouter une langue:";
		if($id==NULL){
			$this->layout->view('langue/vAdd', array(
					'titre'		=>	$titre,
			));
		}else{
			$langue = $this->doctrine->em->find('langue',$id);
			$this->layout->view('langue/vEdit', array(
					'titre'		=>	$titre,
					'langue'	=>	$langue
			));
		}
	}
	
	public function supprimer($id){
		$this->thereIsLayout();
		$langue=$this->doctrine->em->find('langue',$id);
		$this->jsutils->getAndBindTo('.delete','click','cLangue/validDelete','#content');
		$this->jsutils->compile();
		$this->layout->view('langue/vDelete', array(
				'id'		=>	$id,
				'langue'	=>	$langue,
		));
	}
	
	public function validDelete($id){		
		$langue=$this->doctrine->em->find('langue',$id);	
		$idLangue=$langue->getId();
		$nomLangue=utf8_encode($langue->getLangue());
		
		//echo "article<br>";
		$articles=$this->doctrine->em->getRepository('article')->findAll();
		foreach($articles as $article){
			if($article->getIdlangue()->getId()==$idLangue){
				$thisArticle=$this->doctrine->em->find('article',$article->getIdarticle());
				$this->doctrine->em->remove($thisArticle);
				$this->doctrine->em->flush();
			}
		}	
		//echo "page<br>";
		$pages=$this->doctrine->em->getRepository('page')->findAll();
		foreach($pages as $page){
			if($page->getIdlangue()->getId()==$idLangue){
				$thisPage=$this->doctrine->em->find('page',$page->getIdpage());
				$this->doctrine->em->remove($thisPage);
				$this->doctrine->em->flush();
			}
		}
		//echo "compagnie<br>";
		$compagnies=$this->doctrine->em->getRepository('compagnie')->findAll();
		foreach($compagnies as $compagnie){
			if($compagnie->getIdlangue()==$idLangue){
				$thisCompagnie=$this->doctrine->em->find('compagnie',$compagnie->getIdcompagnie());
				$this->doctrine->em->remove($thisCompagnie);
				$this->doctrine->em->flush();
			}
		}
		//echo "languenavbar<br>";
		$languenavbars=$this->doctrine->em->getRepository('languenavbar')->findAll();
		foreach($languenavbars as $languenavbar){
			if($languenavbar->getIdlangue()->getId()==$idLangue){
				$thisLanguenavbar=$this->doctrine->em->find('languenavbar',$languenavbar->getIdlanguenavbar());
				$this->doctrine->em->remove($thisLanguenavbar);
				$this->doctrine->em->flush();
			}
		}
		//echo "textsite<br>";
		$textsites=$this->doctrine->em->getRepository('textsite')->findAll();
		foreach($textsites as $textsite){
			if($textsite->getIdlangue()->getId()==$idLangue){
				$thisTextsite=$this->doctrine->em->find('textsite',$textsite->getIdtext());
				$this->doctrine->em->remove($thisTextsite);
				$this->doctrine->em->flush();
			}
		}
		$this->doctrine->em->remove($langue);
		$this->doctrine->em->flush();
	
		$msg='La langue : "'.$nomLangue.'" a bien été supprimé.';
		$this->layout->view('langue/vDelete', array(
				'msg'		=>	$msg,
		));
	}
	
	function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click','cLangue/add','body');
		$this->jsutils->getAndBindTo('.addLangue','click','cLangue/add','body');
		$this->jsutils->getAndBindTo('.supprimer','click','cLangue/supprimer','body');
		$this->jsutils->compile();
	}
}