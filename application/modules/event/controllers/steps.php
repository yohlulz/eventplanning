<?php

class Steps extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', 'event/ssl'));
        $this->load->library(array('account/authentication'));
		$this->load->model(array('account/account_model','event/event_model'));
		$this->lang->load(array('general'));
		$this->load->helper('xml');
		$this->load->helper('text');
		$this->load->language(array('general', 'event/event','event/event_desc'));
		$this->load->model('gallery_model', 'gallery');
		$this->load->model('feed_post_model', 'posts');
		$this->load->model('slider_model', 'slider');
	}

	function index($type){
		
		maintain_ssl(true);	
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		setCart(false);
		$data['cart']=getCart();
		$data['submenus']=getSubmenus();
		$data['items']=$this->posts->get_site_posts(MEDIUM_LOAD_ITEMS);
		$data['slider']=$this->slider->getSliders(MEDIUM_LOAD_ITEMS);
		$data['page_info']='<div class="welcome">
								<h2>'.lang('event_desc').'</h2>
								<p>'.lang('event_desc_'.$type).'</p>
							</div>';
		if($this->authentication->is_signed_in()){
			$data['page_info'].=$this->event_model->getHeadings($type,true,getCart());
		}
		else{
			$data['page_info'].='<div class="welcome">
								<h2>'.lang('notice').'</h2>
								<p>'.lang('not_logged').'</p>
							</div>';
			$data['page_info'].=$this->gallery->getGalleries(MEDIUM_LOAD_ITEMS,$type,getCart());
		}
		$this->load->view('header');
		$this->load->view('event/events_ask_steps', isset($data) ? $data : NULL);
		$this->load->view('footer');
	}

	function create_event($type){
		maintain_ssl(true);	
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		setCart(false);
		$data['cart']=getCart();
		$data['submenus']=getSubmenus();
		$data['items']=$this->posts->get_site_posts(MEDIUM_LOAD_ITEMS);
		$data['slider']=$this->slider->getSliders(MEDIUM_LOAD_ITEMS);
		$data['page_info']='<div class="welcome">
								<h2>'.lang('event_desc').'</h2>
								<p>'.lang('event_desc_'.$type).'</p>
							</div>';
		if($this->authentication->is_signed_in()){
			$data['page_info'].=$this->event_model->getStepsForType($type,'create_event');
		}
		else{
			$data['page_info'].='<div class="welcome">
								<h2>'.lang('notice').'</h2>
								<p>'.lang('not_logged').'</p>
							</div>';
		}
		$this->load->view('header');
		$this->load->view('event/events_ask_steps', isset($data) ? $data : NULL);
		$this->load->view('footer');					
	}
	
	function edit_event($type){
		
	}
	
	function history_event($type){
		
	}
	
}


/* End of file steps.php */
/* Location: ./system/application/modules/event/controllers/steps.php */