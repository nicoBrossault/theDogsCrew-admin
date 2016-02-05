<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CArticle extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function thereIsLayout(){
		if(!isset($layout)){
			$titre="Article";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		}
	}
	
	public function index($id=1){
		if(!isset($_SESSION['user'])){
			$this->layout->view('index/vConnexion');
		}else{
			$titre="Article";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			
			$this->ajaxGet();
			$this->page_pagination($id);
			
			$user=$this->doctrine->em->find('user',$_SESSION['user']);
			$articles=$this->get_Page($id, '10');
			$this->layout->view("article/vIndex",array('articles'=>$articles, 'user'=>$user));
		}
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
    	
    	$user=$this->doctrine->em->find('user',$_SESSION['user']);
    	if($user->getIdtype()->getIdtype()==2){
	    	return $this->doctrine->em->createQuery("SELECT a FROM article a WHERE a.iduser=".$_SESSION['user'])
	    	->setFirstResult($min)
	    	->setMaxResults($num)
	    	->getResult();
    	}else{
    		return $this->doctrine->em->createQuery("SELECT a FROM article a")
    		->setFirstResult($min)
    		->setMaxResults($num)
    		->getResult();
    	}
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
		$this->thereIsLayout();
		$titre="Modifier/ Ajouter un article :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		$page = $this->doctrine->em->createQuery("SELECT p FROM page p ORDER BY p.idlangue ASC")->getResult();
		if($id==NULL){
			$this->layout->view('article/vAdd', array(
					'titre'		=>	$titre,
					'page'		=>	$page,
					'langues'	=>	$langues,
			));
		}else{
			//auteur article
			$authorArticle=$this->doctrine->em->find('article', $id)->getIduser()->getIdUser();
			$author=$this->doctrine->em->find('user', $_SESSION['user'])->getIdUser();
			$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
			if($authorArticle==$author || $type==1 || $type==3){
				$article=$this->doctrine->em->find('article',$id);
				$page = $this->doctrine->em->createQuery("SELECT p FROM page p")->getResult();
				$this->layout->view('article/vEdit', array(
						'titre'		=>	$titre,
						'article'	=>	$article,
						'page'		=>	$page,
						'langues'	=>	$langues,
				));
			}else{
				redirect('cArticle','refresh');
			}
		}		
	}
	
	public function supprimer($id){
		$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if($type!=3){
		$article = $this->doctrine->em->find('article',$id);
		$this->jsutils->getAndBindTo('.delete','click',base_url().'cArticle/validDelete','#content');
		$this->jsutils->compile();
		$this->layout->view('article/vDelete', array(
				'id'		=>	$id,
				'article'	=>	$article,
		));
		}else{
			redirect('cArticle','refresh');
		}
	}
	
	public function validDelete($id){
		$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if($type!=3){
			$article=$this->doctrine->em->find('article',$id);
			$this->doctrine->em->remove($article);
			$this->doctrine->em->flush();
			
			$msg='L\'article : "'.$article->getTitre().'" a bien été supprimé.';
			$this->layout->view('article/vDelete', array(
					'msg'		=>	$msg,
					'article'	=>	$article,
			));
		}else{
			redirect('cArticle','refresh');
		}
	}
	
	public function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click',base_url().'cArticle/add','body');
		$this->jsutils->getAndBindTo('.addPage','click',base_url().'cArticle/add','body');
		$this->jsutils->getAndBindTo('.supprimer','click',base_url().'cArticle/supprimer','#content');
		$this->jsutils->compile();		
	}
}