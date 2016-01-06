<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Index extends CI_Controller {
	public function __construct(){
		 // Obligatoire
		 parent::__construct();
	 
	}
 
	public function index(){
		echo "pouet";
		$this->load->view('vIndex/index');
	}
}
