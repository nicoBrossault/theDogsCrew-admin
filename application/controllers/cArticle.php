<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CArticle extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();

	}
	
	public function index(){
		$this->load->view('vIndex/index');
	}
}