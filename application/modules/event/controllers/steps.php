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
		$this->load->model('event/step_model', 'step');		
	}

	function index($type,$what='headings',$gmap='nothing'){
		if(!isset($type)) {
			redirect(site_url());
		}
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
				redirect('event/steps/index/'.$type);
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
	
	function history($type,$current,$eventId){
		//TODO
		echo 'to be continued';
	}
	
	function details($what, $eventId, $gmap='nothing') {
		setCart(false);
		if($what === 'steps') {
			$tmpId = $eventId;
		}
		if($what === 'start') {
			$tmpId = $this->step->getById($eventId)->entry_id;
			setCart(true);	
		}
		$eventEntry = $this->event_model->getById($tmpId);
		$type = $eventEntry->type;
		if($eventEntry->status === 'finished') {
			redirect('event/steps/index/'.$type.'/edit#main_menu');
		}
		maintain_ssl($this->config->item("ssl_enabled"));	
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		$data['cart']=getCart();
		$data['submenus']=getSubmenus();
		$data['items']=$this->posts->get_site_posts(MEDIUM_LOAD_ITEMS);
		$data['slider']=$this->slider->getSliders(MEDIUM_LOAD_ITEMS);
		$data['page_info']='<div class="welcome">
								<h2>'.lang('event_desc').'</h2>
								<p>'.lang('event_desc_'.$type).'</p>
							</div>';
		if($this->authentication->is_signed_in()){
			$data['page_info'].=$this->event_model->getEvent('edit',$type,$this->session->userdata('account_id'),$gmap,true,getCart(),'details/'.$what);
			$data['page_info'].=$this->event_model->getDetails($eventId, $what);
		}
		else{
			redirect('event/steps/index/'.$type);
		}
		$this->load->view('header');
		$this->load->view('event/events_ask_steps', isset($data) ? $data : NULL);
		$this->load->view('footer');
	}

	function action($what, $id, $return) {
		if ($what === 'ccst') {//cancel step
			$eventId = $this->step->getById($id)->entry_id;
			$this->step->delete($id);
			redirect('event/steps/details/'.$return.'/'.$eventId.'#main_menu');
		}
		if ($what === 'ccevt') {//cancel event
			$this->event_model->setValue('status', 'canceled', $id);
			redirect('event/steps/index/'.$return.'/edit#main_menu');
		}
	}
	
	function submit_form() {
		$postData = $_POST;
		$step = $this->step->getById($postData['id']);
		if($step->type === 'location') {
			//ciobaneala style
			$this->db->insert('event_place', array('name' => $postData['name'],'address' => $postData['address']));
			$place = $this->db->insert_id();
			$this->event_model->setValue('place',$place,$step->entry_id);
			$this->step->setValue('status','over',$step->id);
			redirect('event/steps/details/steps/'.$step->entry_id);
		}
		else {
			foreach ($postData as $key => $value) {
				if($key != 'id') {
					$this->step->setValue($key,$value,$step->id);
				}
			}
			redirect('event/steps/details/steps/'.$step->entry_id);
		}
	}
}


/* End of file steps.php */
/* Location: ./system/application/modules/event/controllers/steps.php */
