<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Layout {
	private $CI;
	private $output_content= '';
	private $content="";
	private $theme='';
	private $titre='';
	private $isLayout='';

/*
|===============================================================================
| Constructeur
|===============================================================================
*/    
	public function __construct(){
		$this->CI = get_instance();
	}
	
	public function set_theme($theme){
		$this->theme = $theme;
		return true;
	}
	
	public function set_titre($titre){
		$this->titre = $titre;
		return true;
	}
	
	public function getTitre(){
		return $this->titre;
	}
	
	public function setThereIsLayout($isLayout){
		$this->isLayout = $isLayout;
		return true;
	}
	
	public function getThereIsLayout(){
		return $this->isLayout;
	}

/*
|===============================================================================
| Méthodes pour charger les vues
|   . th_default -> affiche la vue par default
|	. view -> afficher les vues
|	. getter setter -> permet l'affichage ou l'édition de la $content
|===============================================================================
*/
	public function th_default(){
		$this->CI->load->view('theme/content/vMenu', array(
								'titre'		=>	$this->titre,
								'layout'	=>	$this->isLayout,
							));
	}
	
	public function setContent($content){
		return $this->content=$content;
	}
	
	public function getContent(){
		return $this->content;
	}
	
	public function view($name, $data = array()){
		$this->setContent($this->CI->load->view($name, $data, true));
		$this->CI->load->view('theme/content/vContent', array(
				'content'	=>	$this->content,
		));
	}
}


/* End of file layout.php */
/* Location: ./application/libraries/layout.php */