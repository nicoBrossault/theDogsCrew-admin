<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CPage extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function thereIsLayout(){
		if(!isset($layout)){
			$titre="Pages";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		}
	}
	
	public function index($id=1){
		if(!isset($_SESSION['user'])){
			$this->layout->view('index/vConnexion');
		}else{
			$titre="Pages";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			
			$this->ajaxGet();
			$this->page_pagination($id);
			
			$user=$this->doctrine->em->find('user',$_SESSION['user']);
			$pagestemp=$this->doctrine->em->getRepository('pagetemp')->findAll();
			$pages=$this->get_Page($id, '10');
			$this->layout->view("page/vIndex",array('pages'=>$pages, 'user'=>$user, 'pagestemp'=>$pagestemp));
		}
	}

	public function page_pagination($id){
		$this->load->helper('text');
			
		$config['base_url'] =base_url().'/cPage/index';
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
    		return $this->doctrine->em->createQuery("SELECT p FROM page p WHERE p.iduser=".$_SESSION['user'])
    		->setFirstResult($min)
    		->setMaxResults($num)
    		->getResult();
    	}else{
    		return $this->doctrine->em->createQuery("SELECT p FROM page p")
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
		$_SESSION['object']="page";
		$titre="Modifier/ Ajouter une page :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		if($id==NULL){
			$this->layout->view('page/vAdd', array(
					'titre'		=>	$titre,
					'langues'	=>	$langues,
			));
		}else{
			//auteur page
			$user=$this->doctrine->em->find('user',$_SESSION['user']);
			$authorPage=$this->doctrine->em->find('page', $id)->getIduser()->getIdUser();
			$author=$this->doctrine->em->find('user', $_SESSION['user'])->getIdUser();
			$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
			$pagesTemp=$this->doctrine->em->getRepository('pagetemp')->findAll();
			
			$exist=false;
			if($authorPage==$author || $type==1 || $type==3){
				foreach($pagesTemp as $pageTemp){
					if($id==$pageTemp->getIdpage()){
						$exist=true;
					}
				}
				if($exist==true && $type==3){
					$thisPageTemp=$this->doctrine->em->createQuery("SELECT p FROM pagetemp p WHERE p.idpage=".$id)
						->getResult();
					foreach($thisPageTemp as $dataPageTemp){
						$id=$dataPageTemp->getIdpagetemp();
					}
					$page = $this->doctrine->em->find('pagetemp',$id);
					$this->layout->view('page/vEditTemp', array(
							'titre'		=>	$titre,
							'page'		=>	$page,
							'langues'	=>	$langues,
							'user'		=>	$user,
					));
				}else{
					$page = $this->doctrine->em->find('page',$id);
					$this->layout->view('page/vEdit', array(
							'titre'		=>	$titre,
							'page'		=>	$page,
							'langues'	=>	$langues,
							'user'		=>	$user,
					));
				}
			}else{
				redirect('cPage','refresh');
			}
		}		
	}
	
	public function supprimer($id){
		$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if($type!=3){
		$page = $this->doctrine->em->createQuery("SELECT p FROM page p WHERE p.idpage =".$id)->getResult();
		$this->jsutils->getAndBindTo('.delete','click',base_url().'cPage/validDelete','#content');
		$this->jsutils->compile();
		$this->layout->view('page/vDelete', array(
				'id'	=>	$id,
				'page'	=>	$page,
		));
		}else{
			redirect('cPage','refresh');
		}
	}
	
	public function validDelete($id){
		$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if($type!=3){
		$page=$this->doctrine->em->find('page',$id);
		$this->doctrine->em->remove($page);
		$this->doctrine->em->flush();
		
		$msg='La page : "'.$page->getTitre().'" a bien été supprimé.';
		$this->layout->view('page/vDelete', array(
				'msg'	=>	$msg,
				'page'	=>	$page,
		));
		}else{
			redirect('cPage','refresh');
		}
	}
	
	public function addTemp(){
		$id=$_GET['id'];
		$this->thereIsLayout();
		$titre="Page modifié :";
	
		$user=$this->doctrine->em->find('user',$_SESSION['user']);
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		$pagetemp=$this->doctrine->em->find('pagetemp',$id);
		$page = $this->doctrine->em->createQuery("SELECT p FROM page p")->getResult();
		$this->layout->view('page/vListTemp', array(
				'titre'		=>	$titre,
				'pagetemp'	=>	$pagetemp,
				'page'		=>	$page,
				'langues'	=>	$langues,
				'user'		=>	$user,
		));
	}
	
	public function validEdit(){
		$id=$_GET['id'];
		$pageTemp=$this->doctrine->em->find('pagetemp',$id);
		$page=$this->doctrine->em->find('page',$pageTemp->getIdpage());
		$page->setDate($pageTemp->getDate());
		$page->setidLangue($this->doctrine->em->find('langue',$pageTemp->getIdlanguetemp()));
		$page->setTitre($pageTemp->getTitre());
		$page->setTexte($pageTemp->getTexte());
		$page->setImage($pageTemp->getImagetemp());
		$this->doctrine->em->persist($page);
		$this->doctrine->em->remove($pageTemp);
		$this->doctrine->em->flush();
		redirect('cPage', 'refresh');
	}
	
	public function cancelEdit(){
		$id=$_GET['id'];
		$pageTemp=$this->doctrine->em->find('pagetemp',$id);
		$this->doctrine->em->remove($pageTemp);
		$this->doctrine->em->flush();
		redirect('cPage', 'refresh');
	}
	
	public function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click',base_url().'cPage/add','body');
		$this->jsutils->getAndBindTo('.addPage','click',base_url().'cPage/add','body');
		$this->jsutils->getAndBindTo('.supprimer','click',base_url().'cPage/supprimer','#content');
		$this->jsutils->compile();		
	}
}