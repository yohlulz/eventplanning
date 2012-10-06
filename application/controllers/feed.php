<?php

class Feed extends CI_Controller {

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
	}
	
	function index()
	{
		$data['title'] = lang('website_title');
        $data['description'] = lang('rss_site_description');
        $data['copyright'] = lang('website_title');
        $data['date'] = date("D M j G:i:s T Y");
        $data['items'] = $this->posts->getPosts(LONG_LOAD_ITEMS);  
        header("Content-Type: application/rss+xml"); // important!
        
        $this->load->view('rss', $data);
	}
}


/* End of file feed.php */
/* Location: ./system/application/controllers/feed.php */
