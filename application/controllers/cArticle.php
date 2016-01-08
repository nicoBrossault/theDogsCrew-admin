<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CArticle extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
		$this->load->helper('text');
	}
	
	public function index(){
		$ajaxReady=false;
		$titre="Articles";
						
		$page = 1;
		$nbPerPage = 3;
		$articles = $this->pagination($page,$nbPerPage);
		
		$this->load->view('theme/vMenu', array('ajaxReady'=>$ajaxReady, 'titre'=>$titre));
		$this->load->view('article/vIndex', array('articles'=>$articles));
		$this->load->view('theme/vFooter');
	}
	
	public function all(){
		$query = $this->doctrine->em->createQuery("SELECT a FROM article a");
		return $query->getResult();
	}
	
	public function pagination($page,$nbPerPage){
		$query = $this->doctrine->em->createQuery("SELECT COUNT(a) FROM article a");
		$nbArticles=$query->getResult();
		
		echo $min = (($page)*$nbPerPage)-($nbPerPage);
		echo $num = $nbPerPage;
		if($min < 0){
			$min = 0;
		}
		$nCondition = " ORDER BY DATE ASC LIMIT ".$min.",". $num;
		$queryNb = $this->doctrine->em->createQuery("SELECT a FROM article a ".$nCondition);
		return $list = $queryNb->getResult();
	}
	
	public function add(){
	}
	
	function ajaxGet(){
		echo "Exemple de get sur click";
	}
}