<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CCompagnie extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}
	
	public function thereIsLayout(){
		if(!isset($layout)){
			$titre="Compagnie";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		}
	}
	
	public function index($id=1){
		if(!isset($_SESSION['user'])){
			$this->layout->view('index/vConnexion');
		}else{
			$titre="Compagnie";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		
			$this->ajaxGet();
			$user=$this->doctrine->em->find('user',$_SESSION['user']);
			if($user->getIdtype()->getIdtype()==2){
				$comps=$this->doctrine->em->createQuery("SELECT c FROM compagnie c WHERE c.iduser=".$_SESSION['user']);
			}else{
				$comps=$this->doctrine->em->getRepository('compagnie')->findAll();
				if($user->getIdtype()->getIdtype()==3){
					$compsTemp=$this->doctrine->em->getRepository('compagnietemp')->findAll();
					$this->layout->view("compagnie/vIndex",array('comps'=>$comps, 'user'=>$user, 'compsTemp'=>$compsTemp));
				}else{
					$this->layout->view("compagnie/vIndex",array('comps'=>$comps, 'user'=>$user));
				}
			}
		}
	}
	
	public function add($id=NULL){
		$this->thereIsLayout();
		$titre="Modifier/ Ajouter une page Compagnie :";
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		if($id==NULL){
			$this->layout->view('compagnie/vAdd', array(
					'titre'		=>	$titre,
					'langues'	=>	$langues,
			));
		}else{
			//auteur page
			$user=$this->doctrine->em->find('user',$_SESSION['user']);
			$authorComp=$this->doctrine->em->find('compagnie', $id)->getIduser();
			$author=$this->doctrine->em->find('user', $_SESSION['user'])->getIdUser();
			$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
			$compsTemp=$this->doctrine->em->getRepository('compagnietemp')->findAll();
				
			$exist=false;
			if($authorComp==$author || $type==1 || $type==3){
				foreach($compsTemp as $compTemp){
					if($id==$compTemp->getIdcompagnie()->getIdcompagnie()){
						$exist=true;
					}
				}
				if($exist==true && $type==3){
					$thisCompTemp=$this->doctrine->em->createQuery("SELECT c FROM compagnietemp c WHERE c.idcompagnie=".$id)
					->getResult();
					foreach($thisCompTemp as $dataCompTemp){
						$id=$dataCompTemp->getIdcompagnietemp();
					}
					$comp = $this->doctrine->em->find('compagnietemp',$id);
					$this->layout->view('compagnie/vEditTemp', array(
							'titre'		=>	$titre,
							'comp'		=>	$comp,
							'langues'	=>	$langues,
							'user'		=>	$user,
					));
				}else{
					$comp = $this->doctrine->em->find('compagnie',$id);
					$this->layout->view('compagnie/vEdit', array(
							'titre'		=>	$titre,
							'comp'		=>	$comp,
							'langues'	=>	$langues,
							'user'		=>	$user,
					));
				}
			}else{
				redirect('cCompagnie','refresh');
			}
		}
	}
	
	public function supprimer($id){
		$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if($type!=3){
			$comp=$this->doctrine->em->find('compagnie',$id);
			$this->jsutils->getAndBindTo('.delete','click',base_url().'cCompagnie/validDelete','#content');
			$this->jsutils->compile();
			$this->layout->view('compagnie/vDelete', array(
					'id'	=>	$id,
					'comp'	=>	$comp,
			));
		}else{
			redirect('cCompagnie','refresh');
		}
	}
	
	public function validDelete($id){
		$type=$this->doctrine->em->find('user', $_SESSION['user'])->getIdtype()->getIdtype();
		if($type!=3){
			$comp=$this->doctrine->em->find('compagnie',$id);
			$this->doctrine->em->remove($comp);
			$this->doctrine->em->flush();
		
			$msg='La page : "'.$comp->getTitre().'" a bien été supprimé.';
			$this->layout->view('compagnie/vDelete', array(
					'msg'	=>	$msg,
					'comp'	=>	$comp,
			));
		}else{
			redirect('cCompagnie','refresh');
		}
	}
	
	public function addTemp(){
		$id=$_GET['id'];
		$this->thereIsLayout();
		$titre="Compagnie modifié :";
	
		$user=$this->doctrine->em->find('user',$_SESSION['user']);
		$langues = $this->doctrine->em->createQuery("SELECT l FROM langue l")->getResult();
		$compTemp=$this->doctrine->em->find('compagnietemp',$id);
		$page = $this->doctrine->em->createQuery("SELECT p FROM page p")->getResult();
		$this->layout->view('compagnie/vListTemp', array(
				'titre'		=>	$titre,
				'compTemp'	=>	$compTemp,
				'page'		=>	$page,
				'langues'	=>	$langues,
				'user'		=>	$user,
		));
	}
	
	public function validEdit(){
		$id=$_GET['id'];
		$compTemp=$this->doctrine->em->find('compagnietemp',$id);
		$compagnie=$this->doctrine->em->find('compagnie',$compTemp->getIdcompagnie()->getIdcompagnie());
		$compagnie->setDate($compTemp->getDate());
		$compagnie->setidLangue($compTemp->getIdlanguetemp()->getIdlangue());
		$compagnie->setTitre($compTemp->getTitretemp());
		$compagnie->setTexte($compTemp->getTextetemp());
		$compagnie->setImage($compTemp->getImagetemp());
		$this->doctrine->em->persist($compagnie);
		$this->doctrine->em->remove($comptemp);
		$this->doctrine->em->flush();
		redirect('cPage', 'refresh');
	}
	
	public function cancelEdit(){
		$id=$_GET['id'];
		$comptemp=$this->doctrine->em->find('compagnietemp',$id);
		$this->doctrine->em->remove($comptemp);
		$this->doctrine->em->flush();
		redirect('cCompagnie', 'refresh');
	}
	
	public function ajaxGet(){
		$this->jsutils->getAndBindTo('.modifier','click',base_url().'cCompagnie/add','body');
		$this->jsutils->getAndBindTo('.addPage','click',base_url().'cCompagnie/add','body');
		$this->jsutils->getAndBindTo('.supprimer','click',base_url().'cCompagnie/supprimer','#content');
		$this->jsutils->compile();
	}
}
