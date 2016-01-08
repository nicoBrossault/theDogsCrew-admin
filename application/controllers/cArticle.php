<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CArticle extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();

	}
	
	public function index(){
		$ajaxReady=false;
		$articles = $this->all();
		$this->load->view('theme/vMenu', array('ajaxReady'=>$ajaxReady, 'articles'=>$articles));
		$this->load->view('article/vIndex');
		$this->load->view('theme/vFooter');
	}
	
	public function all(){
		$query = $this->doctrine->em->createQuery("SELECT a FROM article a");
		$articles = $query->getResult();
	}
	
	function ajaxGet(){
		echo "Exemple de get sur click";
	}
}