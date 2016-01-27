<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CPage extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function index($id=1){
		$titre="Pages";
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		$this->load->helper('text');
    	
    	$config['base_url'] =base_url().'/cPage/index';
    	$config['total_rows'] = $this->count();
    	$config['per_page'] = '10';
    	$per_page=$config['per_page'];
    	$config['full_tag_open'] = '<ul class="pagination">';
    	$config['full_tag_close'] = '</ul>';
    	$config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config ['num_tag_open'] = '<li class="waves-effect">';
        $config ['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		$pages=$this->get_Page($id, $per_page);
		
		$this->jsutils->getAndBindTo('.modifier','click',base_url().'/cPage/add','#content');
		$this->jsutils->getAndBindTo('.addPage','click',base_url().'/cPage/add','#content');
		$this->jsutils->compile();
		
		$this->layout->view("page/vIndex",array('pages'=>$pages));
	}
    
    function get_Page($page,$per_page){
    	$min = (($page)*$per_page)-($per_page);
    	$num = $min + $per_page;
    	
    	return $this->doctrine->em->createQuery(
    			"SELECT p
    			FROM page p 
    			WHERE p.idpage >".$min." AND p.idpage <=".$num." 
    			ORDER BY p.date DESC")->getResult();
    }
	
	public function count(){
		$query = $this->doctrine->em->createQuery("SELECT p FROM page p");
		$pages = $query->getResult();
		$countPages=0;
		foreach ($pages as $data){
			$countPages+=1;
		}
		return $countPages;
	}
	
	public function add($id=NULL){
		$_SESSION['object']="page";
		$titre="Modifier/ Ajouter une page :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		if($id==NULL){
			$this->layout->view('page/vAdd', array(
					'titre'		=>	$titre,
					'langues'	=>	$langues,
			));
		}else{
			$page = $this->doctrine->em->createQuery("SELECT p FROM page p WHERE p.idpage =".$id)->getResult();
			$this->layout->view('page/vEdit', array(
					'titre'		=>	$titre,
					'page'		=>	$page,
					'langues'	=>	$langues,
			));
		}		
	}
}