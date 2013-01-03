<?php

class Steps extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', '../ssl'));
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

	function index($type,$what='headings',$gmap='nothing'){
		
		maintain_ssl($this->config->item("ssl_enabled"));	
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
			$data['page_info'].=$this->event_model->getEvent($what,$type,$this->session->userdata('account_id'),$gmap,true,getCart());
		}
		else{
			if($what==='edit' || $what==='history'){
				redirect('event/steps/index/'.$type.'/'.$what);
			}
			else{
				$data['page_info'].='<div class="welcome">
								<h2>'.lang('notice').'</h2>
								<p>'.lang('not_logged').'</p>
							</div>';
			$data['page_info'].=$this->gallery->getGalleries(MEDIUM_LOAD_ITEMS,$type,getCart());
			}
		}
		$this->load->view('header');
		$this->load->view('event/events_ask_steps', isset($data) ? $data : NULL);
		$this->load->view('footer');
	}

	function submit_new_event($type){
		if($this->authentication->is_signed_in()){
			$steps=$_POST;
			$event_id=$this->event_model->create($steps,$this->session->userdata('account_id'),$type);
			if($event_id==-1){//some error
				//log it
				redirect('event/steps/index/'.$type.'/create#main_menu');
			}
			redirect('event/steps/index/'.$type.'/edit#main_menu');
		}
		else{
			redirect('event/steps/index/'.$type.'#main_menu');
		}
	}
	
	function details($type,$current,$eventId){
		//TODO
		echo 'to be continued';
	}
}


/* End of file steps.php */
/* Location: ./system/application/modules/event/controllers/steps.php */
