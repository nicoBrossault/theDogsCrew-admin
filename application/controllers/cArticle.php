<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CArticle extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function index($id=1){
		$titre="Article";
		$this->layout->set_titre($titre);
		$this->layout->th_default();
		
		$this->ajaxGet();
		$this->page_pagination($id);
		
		$articles=$this->get_Page($id, '10');
		$this->layout->view("article/vIndex",array('articles'=>$articles));
	}

	public function page_pagination($id){
		$this->load->helper('text');
			
		$config['base_url'] =base_url().'/cArticle/index';
		$config['total_rows'] = $this->count();
		$config['per_page'] = '10';
		$config['use_page_numbers']=TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		$config ['num_tag_open'] = '<li class="waves-effect">';
		$config ['num_tag_close'] = '</li>';
	
		$this->pagination->initialize($config);
	}	
	
	function get_Page($page,$per_page){
    	$min = (($page)*$per_page)-($per_page);
    	$num = $min+$per_page;
    	
    	return $this->doctrine->em->createQuery("SELECT a FROM article a")
    	->setFirstResult($min)
    	->setMaxResults($num)
    	->getResult();
    }
	
	public function count(){
		$count=0;
		$articles = $this->doctrine->em->getRepository('article')->findAll();
		foreach ($articles as $data){
			$count+=1;
		}
		return $count;
	}
	
	public function add($id=NULL){
		$_SESSION['object']="article";
		$titre="Modifier/ Ajouter un article :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		$page = $this->doctrine->em->createQuery("SELECT p FROM page p")->getResult();
		if($id==NULL){
			$this->layout->view('article/vAdd', array(
					'titre'		=>	$titre,
					'page'		=>	$page,
					'langues'	=>	$langues,
			));
		}else{
			$article=$this->doctrine->em->find('article',$id);
			$page = $this->doctrine->em->createQuery("SELECT p FROM page p")->getResult();
			$this->layout->view('article/vEdit', array(
					'titre'		=>	$titre,
					'article'	=>	$article,
					'page'		=>	$page,
					'langues'	=>	$langues,
			));
		}		
	}
	
	public function supprimer($id){
		$article = $this->doctrine->em->find('article',$id);
		$this->jsutils->getAndBindTo('.delete','click',base_url().'cArticle/validDelete','#content');
		$this->jsutils->compile();
		$this->layout->view('article/vDelete', array(
				'id'		=>	$id,
				'article'	=>	$article,
		));
	}
	
	public function validDelete($id){
		$article=$this->doctrine->em->find('article',$id);
		$this->doctrine->em->remove($article);
		$this->doctrine->em->flush();
		
		$this->jsutils->getAndBindTo('.delete','click',base_url().'cPage/validDelete','#content');
		$this->jsutils->compile();
		
		$msg='L\'article : "'.$article->getTitre().'" a bien été supprimé.';
		$this->layout->view('article/vDelete', array(
				'msg'		=>	$msg,
				'article'	=>	$article,
		));
	}
	
	public function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click',base_url().'cArticle/add','#content');
		$this->jsutils->getAndBindTo('.addPage','click',base_url().'cArticle/add','#content');
		$this->jsutils->getAndBindTo('.supprimer','click',base_url().'cArticle/supprimer','#content');
		$this->jsutils->compile();		
	}
}