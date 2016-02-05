<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormImgPage extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}

	function index(){
		
		$msg="Aucune images séléctionné...";
		
		if(isset($_POST['imgP']) && !empty($_POST['imgP'])){
			$this->form_validation->set_rules('imgP', 'Images check', 'trim');
			$delImages=$_POST['imgP'];
		}
		
		if(isset($_FILES['fileImg']['name']) && !empty($_FILES['fileImg']['name'])){
			//echo $_FILES['fileImg']['name']."<br>";
			$msg="";
			$addImage=$_FILES['fileImg']['name'];
		}
		
		if ($this->form_validation->run() == FALSE){
			//echo 'test false';
			$titre="Ajouter une image";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
			if(isset($addImage)){
				$msg = $this->addImg($addImage);
			}
			$this->layout->view('imagesPage/vAdd', array('msg'=>$msg));
		}else{
			//echo 'test true';
			if(isset($delImages)){
				$this->delImg($delImages);
			}
			if(isset($addImage)){
				$this->addImg($addImage);
			}
			redirect('cImagePage', 'refresh');
		}
	}
	
	function addImg($addImage){
		$dir= '../theDogsCrew-site/imagesPage/';
		$fileImages = scandir($dir);
		$exist=false;
		foreach($fileImages as $fileImage){
			if($fileImage==$addImage){
				$exist=true;
				return $msg="L'image existe déjà !<br>";
			}
		}
		if(!$exist){
			$this->form_validation->set_rules('userfile', 'File', 'trim');
			$config['upload_path'] = '../theDogsCrew-site/imagesPage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->set_allowed_types('*');
			$data['upload_data'] = '';
	
			if(!$this->upload->do_upload('fileImg')) {
				return $msg=$this->upload->display_errors();
			}else{
				$data['upload_data'] = $this->upload->data();
				return $msg = "Upload success!";
			}
		}
	}
	
	function delImg($dellImages){
		foreach ($dellImages as $image){
			$imgPathFolder="../theDogsCrew-site/imagesPage/";
			$imgPathDB="imagesPage/";
			$pages=$this->doctrine->em->getRepository('page')->findAll();
		
			foreach($pages as $page){
				$imgP=$page->getImage();
				if($imgP==$imgPathDB.$image){
					$page=$this->doctrine->em->find('page',$page->getIdpage());
					$page->setImage(NULL);
					$this->doctrine->em->persist($page);
					$this->doctrine->em->flush();
				}
			}
			unlink($imgPathFolder.$image);
		}
	}
}
?>