<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CArticle extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();

	}
	
	public function index(){
		echo "test 2";
	}
	public function all(){
		$query = $this->doctrine->em->createQuery("SELECT a FROM article a");
		$articles = $query->getResult();
		$this->load->view('vArticle/vArticle',array('articles'=>$articles));
	}
}