<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();

	}
	
	public function index(){
		echo "test 2";
	}
	public function all(){
		$this->load->model('Article');
		$query = $this->doctrine->em->createQuery("SELECT TEXTE.article FROM article");
		$article = $query->getResult();
		$this->load->view('vArticle',array('article'=>$article));
	}
}