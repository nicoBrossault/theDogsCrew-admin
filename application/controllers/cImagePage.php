<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CImagePage extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function thereIsLayout(){
		if(!isset($layout)){
			$titre="Images des pages";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		}
	}
	
	public function index($id=1){
		if(!isset($_SESSION['user'])){
			$this->layout->view('index/vConnexion');
		}else{
			$titre="Images des pages";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			
			$this->ajaxGet();
			//$this->page_pagination($id);
			$count=$this->count();
			
			$imagesP=$this->get_ImageP();
			$this->layout->view("imagesPage/vIndex", array('imagesP'=>$imagesP, 'count'=>$count));
		}
	}	
	
    function get_ImageP(){
		$dir    = '../theDogsCrew-site/imagesPage/';
		$fileImages = scandir($dir);
		$exist=false;
		return $fileImages;
    }
	
	public function count(){
		$count=0;
		$dir    = '../theDogsCrew-site/imagesPage/';
		$fileImages = scandir($dir);
		$exist=false;
		foreach($fileImages as $fileImage){
			$count+=1;
		}
		return $count;
	}
	
	public function add(){
		$this->thereIsLayout();
		$this->layout->view('imagesPage/vAdd');
	}
	
	public function ajaxGet(){
		$this->jsutils->getAndBindTo('.ajoutImgP','click',base_url().'cImagePage/add','body');
		$this->jsutils->compile();		
	}
}