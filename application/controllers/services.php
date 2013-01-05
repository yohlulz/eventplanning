<?php
class Services extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		// Load the necessary stuff...
		$this->load->helper(array('public_events', 'language', 'url', 'form', 'account/ssl'));
        $this->load->library(array('account/authentication'));
		$this->load->model(array('account/account_model'));
		$this->lang->load(array('general'));
		$this->load->model('feed_post_model', 'posts');
		$this->load->model('slider_model', 'slider');
	}
	
	function index()
	{
		maintain_ssl();
		if($this->config->item('DEMO')===TRUE){
			demoLogin();
		}
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		setCart(false);
        $data['cart']=getCart();
       	$data['items']=$this->posts->get_site_posts(MEDIUM_LOAD_ITEMS);
		$data['submenus']=getSubmenus();
		$data['slider']=$this->slider->getSliders(MEDIUM_LOAD_ITEMS);
//		$data['gmap']=getPlace("Iulius Mall").getPlace("21 Decembrie","street");
		$data['page_info']='<div class="welcome">'. lang('welcome_message') . '</div><br/>
								<div class="cl">&nbsp;</div>';
		$data['page_info'].='<div class="news">';
		$entires = $this->slider->getSliderItems('services');
		$lang=$this->session->userdata('lang');
		if($lang==''){
			$lang='english';
			$this->session->set_userdata('lang',$lang);
		}
		$count =0;
		foreach ($entires as $entry) {
			$count++;
			$data['page_info'].='<div class="news-item">';
			$data['page_info'] .= '<span class="news-pointer">'.$count.'</span>';
			$data['page_info'].='<div class="news-body">
						<h3>'.$entry->getTitle($lang).'</h3>
						<div class="cl">&nbsp;</div>
						<p>'.$entry->getDescription($lang).'<br/><br/><br/>
						<img src="'.$entry->getPath().'" style="width: 650px; height: auto;margin-left: -90px;"/></p>
						<div class="cl">&nbsp;</div>
					</div>
					<div class="cl">&nbsp;</div>
				</div>';							
		}
		$data['page_info'].='</div>';
		$this->load->view('header');
		$this->load->view('home', isset($data) ? $data : NULL);
		$this->load->view('footer');
	}
}


/* End of file services.php */
/* Location: ./system/application/controllers/services.php */
