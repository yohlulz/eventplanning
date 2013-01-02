<?php
/*
 * Reset_password Controller
 */
class Reset_password extends CI_Controller {
	
	/**
	 * Constructor
	 */
    function __construct()
    {
        parent::__construct();
		
		// Load the necessary stuff...
		$this->load->config('account/account');
		$this->load->helper(array('date', 'language', 'account/ssl', 'url'));
        $this->load->library(array('account/authentication', 'account/recaptcha', 'form_validation'));
		$this->load->model(array('account/account_model'));
		$this->load->language(array('general', 'account/reset_password'));
		$this->load->model('feed_post_model', 'posts');
		$this->load->model('slider_model', 'slider');
	}
	
	/**
	 * Reset password
	 */
	function index() 
	{
		// Enable SSL?
		maintain_ssl($this->config->item("ssl_enabled"));
		
		// Redirect signed in users to homepage
		if ($this->authentication->is_signed_in()) redirect('');
		
		// Check recaptcha
		$recaptcha_result = $this->recaptcha->check();
		$data['items']=$this->posts->get_site_posts(MEDIUM_LOAD_ITEMS);
		$data['submenus']=getSubmenus();
		$data['slider']=$this->slider->getSliders(MEDIUM_LOAD_ITEMS);
		setCart(false);
        $data['cart']=getCart();
		
		// User has not passed recaptcha
		if ($recaptcha_result !== TRUE)
		{
			if ($this->input->post('recaptcha_challenge_field')) 
			{
				$data['reset_password_recaptcha_error'] = $recaptcha_result ? lang('reset_password_recaptcha_incorrect') : lang('reset_password_recaptcha_required');
			}
			
			// Load recaptcha code
			$data['recaptcha'] = $this->recaptcha->load($recaptcha_result, $this->config->item("ssl_enabled"));
			
			// Load reset password captcha view
			$this->load->view('header');
			$this->load->view('reset_password_captcha', isset($data) ? $data : NULL);
			$this->load->view('footer');
			return;
		}
		
		// Get account by email
		if ($account = $this->account_model->get_by_id($this->input->get('id')))
		{
			// Check if reset password has expired
			if (now() < (strtotime($account->resetsenton) + $this->config->item("password_reset_expiration")))
			{
				// Check if token is valid
				if ($this->input->get('token') == sha1($account->id.strtotime($account->resetsenton).$this->config->item('password_reset_secret')))
				{
					// Remove reset sent on datetime
					$this->account_model->remove_reset_sent_datetime($account->id);
					
					// Upon sign in, redirect to change password page
					$this->session->set_userdata('sign_in_redirect', 'account/account_password');
					
					// Run sign in routine
					$this->authentication->sign_in($account->id);
				}
			}
		}
		
		// Load reset password unsuccessful view
		$this->load->view('header');
		$this->load->view('reset_password_unsuccessful', isset($data) ? $data : NULL);
		$this->load->view('footer');
	}
	
}


/* End of file reset_password.php */
/* Location: ./application/modules/account/controllers/reset_password.php */
