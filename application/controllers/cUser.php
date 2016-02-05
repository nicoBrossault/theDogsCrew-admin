<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CUser extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function thereIsLayout(){
		if(!isset($layout)){
			echo $this->jsutils->compile();
			$titre="Utilisateur";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		}
	}
	
	public function index($id=1){
		if(!isset($_SESSION['user'])){
			$this->layout->view('index/vConnexion');
		}else{
			$user=$this->doctrine->em->find('user',$_SESSION['user']);
			$this->ajaxGet();
			if($user->getIdtype()->getIdtype()!=1){
				$this->layout->setThereIsLayout(true);
				$titre="Utilisateur";
				$this->layout->set_titre($titre);
				$this->layout->th_default();
				$this->add($id=$user->getIduser());
			}else{
				$isAdmin=true;
				$titre="Utilisateurs";
				$this->layout->setThereIsLayout(true);
				$this->layout->set_titre($titre);
				$this->layout->th_default();
				$users=$this->doctrine->em->getRepository('user')->findAll();
				$users=$this->doctrine->em->createQuery('SELECT u FROM user u ORDER BY u.idtype')->getResult();
				$this->layout->view("user/vIndex",array('users'=>$users));
			}
		}
	}
	
	public function add($id=NULL){
		$this->layout->getThereIsLayout();
		$this->ajaxGet();
		$this->thereIsLayout();
		$isAdmin=false;
		if($this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype()==1){
			$isAdmin=true;
		}
		$titre="Modifier/ Ajouter un Utilisateur :";
		$types=$this->doctrine->em->getRepository('userType')->findAll();
		if($id==NULL){
			$this->layout->view('user/vAdd', array(
					'titre'		=>	$titre,
					'types'		=>	$types,
					'isAdmin'	=>	$isAdmin,
			));
		}else{
			$user=$this->doctrine->em->find('user',$id);
			$this->layout->view("user/vEdit",array(
					'titre'		=>	$titre,
					'user'		=>	$user,
					'types'		=>	$types,
					'isAdmin'	=>	$isAdmin
			));
		}
	}
	
	public function editMdp($id){
		$user=$this->doctrine->em->find('user',$id);
		$this->layout->view("user/vEditMdp",array('user'=>$user));
	}
	
	public function supprimer($id){
		$user = $this->doctrine->em->find('user',$id);
		$this->jsutils->getAndBindTo('.delete','click',base_url().'cUser/validDelete','#content');
		$this->jsutils->compile();
		$this->layout->view('user/vDelete', array(
				'id'		=>	$id,
				'user'		=>	$user,
		));
	}
	
	public function validDelete($id){
		$user=$this->doctrine->em->find('user',$id);
		$this->doctrine->em->remove($user);
		$this->doctrine->em->flush();
	
		$msg='L\'utilisateur : "'.$user->getPrenom().' '.$user->getNom().'" a bien été supprimé.';
		$this->layout->view('user/vDelete', array(
				'msg'		=>	$msg,
				'user'		=>	$user,
		));
	}
	
	public function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click','cUser/add','body');
		$this->jsutils->getAndBindTo('.addUser','click','cUser/add','body');
		$this->jsutils->getAndBindTo('.supprimer','click','cUser/supprimer','#content');
		$this->jsutils->getAndBindTo('.editMdp','click','cUser/editMdp','.editionMdp');
		$this->jsutils->compile();
	}
}