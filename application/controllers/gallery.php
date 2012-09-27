<?php

class Gallery extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', 'account/ssl'));
        $this->load->library(array('account/authentication'));
		$this->load->model(array('account/account_model'));
		$this->lang->load(array('general'));
		$this->load->helper('xml');
		$this->load->helper('text');
		$this->load->model('feed_post_model', 'posts');
		$this->load->model('gallery_model', 'gallery');
	}
	
	function index()
	{
		$data['items'] = $this->posts->get_site_posts(10);
		setCart(true);
        $data['cart']=getCart();
       	$data['gallery']=$this->gallery->getGalleries(5,'',true);
		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		$data['submenus']=getSubmenus();
		$data['page_info']='';
	    
        $this->load->view('header');
        $this->load->view('gallery', isset($data)?$data:NULL);
		$this->load->view('footer');
	}
}


/* End of file gallery.php */
/* Location: ./system/application/controllers/gallery.php */
