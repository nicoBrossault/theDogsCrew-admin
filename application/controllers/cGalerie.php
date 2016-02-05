<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CGalerie extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function thereIsLayout(){
		if(!isset($layout)){
			$titre="Galerie";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		}
	}
	
	public function index($id=1){
		if(!isset($_SESSION['user'])){
			$this->layout->view('index/vConnexion');
		}else{
			$titre="Galerie";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			
			$this->ajaxGet();
			$this->page_pagination($id);
			
			$imgGaleries=$this->get_Page($id, '10');
			$this->layout->view("galerie/vIndex",array('imgGaleries'=>$imgGaleries));
		}
	}

	public function page_pagination($id){
		$this->load->helper('text');
			
		$config['base_url'] =base_url().'/cGalerie/index';
		$config['total_rows'] = $this->count();
		$config['per_page'] = '10';
		$config['use_page_numbers']=TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		$config ['num_tag_open'] = '<li class="waves-effect">';
		$config ['num_tag_close'] = '</li>';
	
		$this->pagination->initialize($config);
	}	
	
	function get_Page($page,$per_page){
    	$min = (($page)*$per_page)-($per_page);
    	$num = $min+$per_page;
    	
    	return $this->doctrine->em->createQuery("SELECT i FROM image i")
    	->setFirstResult($min)
    	->setMaxResults($num)
    	->getResult();
    }
	
	public function count(){
		$count=0;
		$images = $this->doctrine->em->getRepository('image')->findAll();
		foreach ($images as $data){
			$count+=1;
		}
		return $count;
	}
	
	public function add($id=NULL){
		$this->thereIsLayout();
		$_SESSION['object']="image";
		$titre="Modifier/ Ajouter une image :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		if($id==NULL){
			$this->layout->view('galerie/vAdd', array(
					'titre'		=>	$titre,
					'langues'	=>	$langues,
			));
		}else{
			$imgGalerie=$this->doctrine->em->find('image',$id);
			$this->layout->view('galerie/vEdit', array(
					'titre'			=>	$titre,
					'imgGalerie'	=>	$imgGalerie,
					'langues'		=>	$langues,
			));
		}		
	}
	
	public function supprimer($id){
		$imgGalerie=$this->doctrine->em->find('image',$id);
		$this->jsutils->getAndBindTo('.delete','click',base_url().'cGalerie/validDelete','#content');
		$this->jsutils->compile();
		$this->layout->view('galerie/vDelete', array(
				'id'			=>	$id,
				'imgGalerie'	=>	$imgGalerie,
		));
	}
	
	public function validDelete($id){
		$imgGalerie=$this->doctrine->em->find('image',$id);
		$imgPathFolder="../theDogsCrew-site/";
		unlink($imgPathFolder.$imgGalerie->getUrl());
		$this->doctrine->em->remove($imgGalerie);
		$this->doctrine->em->flush();
		
		$msg='L\'image : "'.$imgGalerie->getTitre().'" a bien été supprimé.';
		$this->layout->view('galerie/vDelete', array(
				'msg'		=>	$msg,
				'imgGalerie'	=>	$imgGalerie,
		));
	}
	
	public function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click',base_url().'cGalerie/add','body');
		$this->jsutils->getAndBindTo('.addPage','click',base_url().'cGalerie/add','body');
		$this->jsutils->getAndBindTo('.supprimer','click',base_url().'cGalerie/supprimer','#content');
		$this->jsutils->compile();		
	}
}