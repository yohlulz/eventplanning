<?php

class Changelanguage extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', 'account/ssl'));
        $this->load->library(array('account/authentication'));
		$this->load->model(array('account/account_model'));
		$this->lang->load(array('general'));
	}
	
	function index($lang='english',$url='default',$uri1='',$uri2='',$uri3='')
	{
		$site_url=$url==='default'?'':$url;
		if($uri1!=''){
			$site_url.='/'.$uri1;
		}
		if($uri2!=''){
			$site_url.='/'.$uri2;
		}
		if($uri3!=''){
			$site_url.='/'.$uri3;
		}		
		$this->session->set_userdata('lang',$lang);
		redirect($site_url);
	}
	
}


/* End of file switch.php */
/* Location: ./system/application/controllers/switch.php */
