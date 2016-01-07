<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Index extends CI_Controller {
	public function __construct(){
		 // Obligatoire
		 parent::__construct();
		 //the library "jsUtils" was load in : autoload.php
	}
 
	public function index(){
		$this->jsutils->getAndBindTo(".article","click","Index/ajaxGet","#reponse");
		echo $this->jsutils->compile();
		$this->load->view('index/vIndex');
	}
	
	function ajaxGet(){
		echo "Exemple de get sur click";
	}
}
