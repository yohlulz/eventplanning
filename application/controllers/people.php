<?php
class People extends CI_Controller {

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
		$this->load->model('people_model');
	}
	
	function index()
	{
		maintain_ssl();
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		setCart(false);
        $data['cart']=getCart();
       	$data['items']=$this->posts->get_site_posts(MEDIUM_LOAD_ITEMS);
		$data['submenus']=getSubmenus();
		$data['slider']=$this->slider->getSliders(MEDIUM_LOAD_ITEMS);
		$data['page_info']='<div class="news"><h2>'. lang('who_are_we') . '</h2>
								<div class="cl">&nbsp;</div><br/>'.$this->people_model->getPlanners().'
								<div class="cl">&nbsp;</div>
							</div>';
		$this->load->view('header');
		$this->load->view('home', isset($data) ? $data : NULL);
		$this->load->view('footer');
	}
	
}


/* End of file home.php */
/* Location: ./system/application/controllers/home.php */
