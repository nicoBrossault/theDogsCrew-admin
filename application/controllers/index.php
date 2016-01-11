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
		$ajaxReady=true;
		$titre = "Index";

		$this->layout->view('index/vIndex',array(
							'titre'=>$titre,
							'ajaxReady'=>$ajaxReady));
		
	}
	
	function ajaxGet(){
		echo "Exemple de get sur click";
	}
}
