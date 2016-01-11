<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CArticle extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
		$this->load->helper('text');
	}
	
	public function index(){
		$ajaxReady=true;
		$titre="Articles";

		$this->jsutils->getAndBindTo('.page','click','cArticle/getId','#list');
		$this->jsutils->compile();
		
		$varPage = $this->pagination();
		
		$nbPages = $varPage['nbPages'];
		$articles = $varPage['articles'];
		
		$this->layout->view('article/vIndex',array(
							'titre'=>$titre,
							'ajaxReady'=>$ajaxReady,
							'articles'=>$articles,
							'nbPages'=>$nbPages));
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
	
	public function getId($id){
		$_SESSION['page']=$id;
		$this->index();
	}
	
	public function pagination(){
		if(!isset($_SESSION['page'])){
			$_SESSION['page'] = 1;
		}
		
		$page=$_SESSION['page'];
		$nbPerPage = 1;
		$nbArticles = $this->count();
		
		$nbPages=ceil($nbArticles/$nbPerPage);
		
		$min = (($page)*$nbPerPage)-($nbPerPage);
		$num = $min + $nbPerPage;
		if($min < 0){
			$min = 0;
		}
		$nCondition = "WHERE a.idarticle >".$min." AND a.idarticle <=".$num." ORDER BY a.date ASC";
		$queryNb = $this->doctrine->em->createQuery("SELECT a FROM article a ".$nCondition);
		return $varPage=array('articles'=>$queryNb->getResult(),'nbPages'=>$nbPages);
		
	}
	
	public function add(){
	}
	
	function ajaxGet(){
		echo "Exemple de get sur click";
	}
}