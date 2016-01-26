<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CArticle extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
public function index($id=1){
		$titre="Articles";
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		$this->load->helper('text');
    	
    	$config['base_url'] =base_url().'/cArticle/index';
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
		$articles=$this->get_Article($id, $per_page);
		
		$this->jsutils->getAndBindTo('.modifier','click',base_url().'/cArticle/add','#content');
		$this->jsutils->compile();
		
		$this->layout->view("article/vIndex",array('articles'=>$articles));
	}
    
    function get_Article($page,$per_page){
    	$min = (($page)*$per_page)-($per_page);
    	$num = $min + $per_page;
    	
    	return $this->doctrine->em->createQuery(
    			"SELECT a 
    			FROM article a 
    			WHERE a.idarticle >".$min." AND a.idarticle <=".$num." 
    			ORDER BY a.date DESC")->getResult();
    }
	
	public function count(){
		$query = $this->doctrine->em->createQuery("SELECT a FROM article a");
		$articles = $query->getResult();
		$nbArticles=0;
		foreach ($articles as $data){
			$nbArticles+=1;
		}
		return $nbArticles;
	}
	
	public function add($id){
		$_SESSION['object']="article";
		$titre="Modifier/ Ajouter un article :";
		
		$queryNb = $this->doctrine->em->createQuery("SELECT a FROM article a WHERE a.idarticle =".$id);
		$article = $queryNb->getResult();
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		$pages = $this->doctrine->em->createQuery("SELECT p FROM page p")->getResult();
		
		$this->layout->view('article/vAdd', array(
						'titre'		=>	$titre,
						'article'	=>	$article,
						'langues'	=>	$langues,
						'pages'		=>	$pages,
						));
	}
	
	function ajaxGet(){
		$this->jsutils->getAndBindTo('.page','click','cArticle/getId','#content');
		$this->jsutils->getAndBindTo('.modifier','click','add','#content');
		$this->jsutils->compile();
	}
}