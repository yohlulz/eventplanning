<?php

class Ajax extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		// Load the necessary stuff...
		$this->load->helper(array('language', 'url'));
        	//$this->load->library(array('account/authentication'));
		//$this->load->model(array('account/account_model'));
		$this->lang->load(array('general'));
	}
	
	function index($url='default',$uri1='',$uri2='')
	{
	$this->load->library('email');
	$name=$this->input->post('name');
	$email=$this->input->post('email');	
	$message=$this->input->post('message');

	// Send email
	$this->email->from($this->config->item('contact_from_email'), lang('reset_password_email_sender'));
	$this->email->to($this->config->item('contact_to_email'))
		->reply_to($email)
		->subject($this->config->item('contact_subject').lang('reset_password_email_sender'))
		->message($message)
		->send();

	$site_url=$url==='default'?'':$url;
	if($uri1!=''){
		$site_url.='/'.$uri1;
	}
	if($uri1!=''){
		$site_url.='/'.$uri2;
	}		
	echo $site_url;
	redirect($site_url);
	}
	
}


/* End of file ajax.php */
/* Location: ./system/application/controllers/ajax.php */
