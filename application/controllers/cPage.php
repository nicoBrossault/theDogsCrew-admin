<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CPage extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function index(){
		$titre="Page";
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		
		$this->load->helper('text');
		
		$this->listPages();
	}
	
	public function count(){
		$query = $this->doctrine->em->createQuery("SELECT p FROM page p");
		$pages = $query->getResult();
		$countPages=0;
		foreach ($pages as $data){
			$countPages+=1;
		}
		return $countPages;
	}
	
	public function getId($id){
		$_SESSION['pageP']=$id;
		$this->listPages();
	}
	
	public function listPages(){
		$this->load->helper('text');
		$this->jsutils->getAndBindTo('.page','click','cPage/getId','#content');
		$this->jsutils->getAndBindTo('.modifier','click','cPage/add','#content');
		$this->jsutils->compile();
	
		$varPage = $this->pagination();
	
		$this->layout->view('page/vIndex', $data=$varPage);
	}
	
	public function pagination(){
		if(!isset($_SESSION['pageP'])){
			$_SESSION['pageP'] = 1;
		}
		
		$page=$_SESSION['pageP'];
		$nbPerPage = 5;
		$countPages = $this->count();
		
		$nbPages=ceil($countPages/$nbPerPage);
		
		$min = (($page)*$nbPerPage)-($nbPerPage);
		$num = $min + $nbPerPage;
		if($min < 0){
			$min = 0;
		}
		$nCondition = "WHERE p.idpage >".$min." AND p.idpage <=".$num." ORDER BY p.date ASC";
		$queryNb = $this->doctrine->em->createQuery("SELECT p FROM page p ".$nCondition);
		return $varPage=array(	'pages'		=>	$queryNb->getResult(),
								'nbPages'	=>	$nbPages,
								'numP'		=>	$numP=$_SESSION['pageP']
								);
		
	}
	
	public function add(){
		$ajaxReady=false;
		$titre="Modifier/ Ajouter une page :";
		$this->layout->view('page/vAdd', array(
						'titre'=>$titre,
						'ajaxReady'=>$ajaxReady,));
	}
	
	function ajaxGet(){
		echo "Exemple de get sur click";
	}
}