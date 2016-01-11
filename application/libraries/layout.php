<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Layout {
	private $CI;
	private $output_content= '';

/*
|===============================================================================
| Constructeur
|===============================================================================
*/    
	public function __construct(){
		$this->CI = get_instance();
	}

/*
|===============================================================================
| Méthodes pour charger les vues
|   . view
|   . views
|===============================================================================
*/
	public function view($name, $data = array()){
		$this->output_content .= $this->CI->load->view($name, $data, true);
		$this->CI->load->view('theme/material', array('output_content' => $this->output_content));
	}

	public function views($name, $data = array()){
		$this->output_content .= $this->CI->load->view($name, $data, true);
		 return $this;
	}
}


/* End of file layout.php */
/* Location: ./application/libraries/layout.php */