<?php
/*
 * Sign_out Controller
 */
class Sign_out extends CI_Controller {
	
	/**
	 * Constructor
	 */
    function __construct()
    {
        parent::__construct();
		
		// Load the necessary stuff...
		$this->load->helper(array('language', 'url'));
		$this->load->config('account/account');
		$this->load->language(array('general', 'account/sign_out'));
        $this->load->library(array('account/authentication'));
		$this->load->model('feed_post_model', 'posts');
		$this->load->model('slider_model', 'slider');
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Account sign out
	 *
	 * @access public
	 * @return void
	 */
	function index()
	{
		// Redirect signed out users to homepage
		if ( ! $this->authentication->is_signed_in()) redirect('');
		
		// Run sign out routine
		$this->authentication->sign_out();
		
		// Redirect to homepage
		if ( ! $this->config->item("sign_out_view_enabled")) redirect('');
		
		// Load sign out view
		$data['items']=$this->posts->get_site_posts(MEDIUM_LOAD_ITEMS);
		$data['submenus']=getSubmenus();
		$data['slider']=$this->slider->getSliders(MEDIUM_LOAD_ITEMS);
		setCart(false);
        $data['cart']=getCart();
		
		$this->load->view('header');
		$this->load->view('sign_out');
		$this->load->view('footer');
	}
	
}


/* End of file sign_out.php */
/* Location: ./application/modules/account/controllers/sign_out.php */
