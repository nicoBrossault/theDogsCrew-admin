<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormImgPage extends CI_Controller {
	public function __construct(){
		// Obligatoire
		parent::__construct();
	}

	function index(){
		if(isset($_POST['imgP']) && !empty($_POST['imgP'])){
			$this->form_validation->set_rules('imgP', 'Images check', 'trim');
			$dellImages=$_POST['imgP'];
		}
		
		if(isset($_FILES['fileImg']['name']) && !empty($_FILES['fileImg']['name'])){
			$addImage=$_FILES['fileImg']['name'];
		}
		
		if ($this->form_validation->run() == FALSE){
			echo 'test false';
			$titre="Images des Pages";
			$this->layout->set_titre($titre);
			$this->layout->th_default();
		}else{
			//echo 'test true';
			if(isset($images)){
				$this->delImg($dellImages);
			}
			if(isset($image)){
				$this->addImg($addImage);
			}
			redirect('cImagePage', 'refresh');
		}
	}
	
	function addImg($addImage){
		$dir    = '../theDogsCrew-site/imagesPage/';
		$fileImages = scandir($dir);
		$exist=false;
		foreach($fileImages as $fileImage){
			if($fileImage==$addImage){
				$exist=true;
			}
		}
		if(!$exist){
			$config['upload_path'] = '../theDogsCrew-site/imagesPage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->set_allowed_types('*');
			$data['upload_data'] = '';
	
			if(!$this->upload->do_upload('fileImg')) {
				$data = array('msg' => $this->upload->display_errors());
			}else{
				$data = array('msg' => "Upload success!");
				$data['upload_data'] = $this->upload->data();
			}
		}
	}
	
	function delImg($dellImages){
		foreach ($images as $image){
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