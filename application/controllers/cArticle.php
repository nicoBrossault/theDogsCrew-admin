<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CArticle extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function index(){		
		$titre="Articles";
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		
		$this->load->helper('text');
		
		$this->listArticle();
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
	
	public function listArticle(){
		$this->ajaxGet();
		$this->load->helper('text');
				
		$varPage = $this->pagination();
		
		$this->layout->view('article/vIndex',$data=$varPage);
	}
	
	public function getId($id){
		$_SESSION['pageA']=$id;
		$this->listArticle();
	}
	
	public function pagination(){
		if(!isset($_SESSION['pageA'])){
			$_SESSION['pageA'] = 1;
		}
		
		$page=$_SESSION['pageA'];
		$nbPerPage = 5;
		$nbArticles = $this->count();
		
		$nbPages=ceil($nbArticles/$nbPerPage);
		
		$min = (($page)*$nbPerPage)-($nbPerPage);
		$num = $min + $nbPerPage;
		if($min < 0){
			$min = 0;
		}
		$nCondition = "WHERE a.idarticle >".$min." AND a.idarticle <=".$num." ORDER BY a.date ASC";
		$queryNb = $this->doctrine->em->createQuery("SELECT a FROM article a ".$nCondition);
		return $varPage=array(	'articles'	=>	$queryNb->getResult(),
								'nbPages'	=>	$nbPages,
								'numA'		=>	$numP=$_SESSION['pageA'],
								);
		
	}
	
	public function add($id){
		$_SESSION['object']="article";
		$titre="Modifier/ Ajouter un article :";
		
		$queryNb = $this->doctrine->em->createQuery("SELECT a FROM article a WHERE a.idarticle =".$id);
		$article = $queryNb->getResult();
		
		$this->layout->view('article/vAdd', array(
						'titre'		=>	$titre,
						'article'	=>	$article,
						));
	}
	
	function ajaxGet(){
		$this->jsutils->getAndBindTo('.page','click','cArticle/getId','#content');
		$this->jsutils->getAndBindTo('.modifier','click','cArticle/add','#content');
		$this->jsutils->compile();
	}
}