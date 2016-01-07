<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CArticle extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();

	}
	
	public function index(){
		$this->jsutils->getAndBindTo(".article","click","CArticle/ajaxGet","#response");
		echo $this->jsutils->compile();
		$this->load->view('article/vIndex');
	}
	
	function ajaxGet(){
		echo "Exemple de get sur click";
	}
}