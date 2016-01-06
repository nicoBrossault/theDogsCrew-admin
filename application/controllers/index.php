<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Index extends CI_Controller {
	public function __construct(){
		 // Obligatoire
		 parent::__construct();
		 $this->load->library('javascript/jquery');
	}
 
	public function index(){
		$this->load->view('vIndex/index');
	}
}
