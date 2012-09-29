<?php

class Events extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', 'account/ssl'));
        $this->load->library(array('account/authentication'));
		$this->load->model(array('account/account_model'));
		$this->lang->load(array('general'));
//		$this->load->helper('xml');
//		$this->load->helper('text');
		$this->load->model('feed_post_model', 'posts');
		$this->load->model('slider_model', 'slider');
//		$this->load->model('gallery_model', 'gallery');
	}
	
	function index()
	{
		/*
		$data['items'] = $this->posts->get_site_posts(10);
		setCart(true);
        $data['cart']=getCart();
       	$data['gallery']=$this->gallery->getGalleries(5,'',true);
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		$data['submenus']=getSubmenus();
	    
        $this->load->view('header');
        $this->load->view('gallery', isset($data)?$data:NULL);
		$this->load->view('footer');
		 */
	}
	
	function steps($type){
		
		maintain_ssl();	
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		setCart(false);
		$data['cart']=getCart();
		$data['submenus']=getSubmenus();
		$data['items']=$this->posts->get_site_posts(5);
		$data['slider']=$this->slider->getSliders(5);
		$data['page_info']='<div class="welcome">
								<h2>'.lang('event_desc').'</h2>
								<p>'.lang('event_desc_'.$type).'</p>
							</div>';
		if($this->authentication->is_signed_in()){
		//TODO	
		}
		else{
			$data['page_info'].='<div class="welcome">
								<h2>'.lang('notice').'</h2>
								<p>'.lang('not_logged').'</p>
							</div>';
		}
		$this->load->view('header');
		$this->load->view('events_ask_steps', isset($data) ? $data : NULL);
		$this->load->view('footer');
	}
	
}


/* End of file events.php */
/* Location: ./system/application/controllers/events.php */
