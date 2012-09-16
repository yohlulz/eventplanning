<?php

class Ajax extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		
		// Load the necessary stuff...
		$this->load->helper(array('language', 'url'));
        	//$this->load->library(array('account/authentication'));
		//$this->load->model(array('account/account_model'));
		$this->lang->load(array('general'));
	}
	
	function index($url='default',$uri1='',$uri2='')
	{
	$this->load->library('email');
	$name=$this->input->post('name');
	$email=$this->input->post('email');	
	$message=$this->input->post('message');

	// Send email
	$this->email->from($this->config->item('contact_from_email'), lang('reset_password_email_sender'));
	$this->email->to($this->config->item('contact_to_email'))
		->reply_to($email)
		->subject($this->config->item('contact_subject').lang('reset_password_email_sender'))
		->message($message)
		->send();

	$site_url=$url==='default'?'':$url;
	if($uri1!=''){
		$site_url.='/'.$uri1;
	}
	if($uri1!=''){
		$site_url.='/'.$uri2;
	}		
	redirect($site_url);
	}

	function share($type){
		$url='https://eventplaning.uk.to';		
		$json = array('url'=>'','count'=>0);
  		$json['url'] = $url;
		if(filter_var($url, FILTER_VALIDATE_URL)){
    if($type == 'googlePlus'){  //source http://www.helmutgranda.com/2011/11/01/get-a-url-google-count-via-php/
      $content = parse("https://plusone.google.com/u/0/_/+1/fastbutton?url=".$url."&count=true");
      
      $dom = new DOMDocument;
      $dom->preserveWhiteSpace = false;
      @$dom->loadHTML($content);
      $domxpath = new DOMXPath($dom);
      $newDom = new DOMDocument;
      $newDom->formatOutput = true;
      
      $filtered = $domxpath->query("//div[@id='aggregateCount']");
      $json['count'] = str_replace('>', '', $filtered->item(0)->nodeValue);
    }
    else if($type == 'stumbleupon'){
      $content = parse("http://www.stumbleupon.com/services/1.01/badge.getinfo?url=$url");
      
      $result = json_decode($content);
      $json['count'] = $result->result->views;
      if( !isset($json['count']) ) $json['count'] = 0;
    }
    else if($type == 'pinterest'){
      $content = parse("http://api.pinterest.com/v1/urls/count.json?callback=&url=$url");
      
      $result = json_decode(str_replace(array('(', ')'), array('', ''), $content));
      $json['count'] = $result->count;
      if( !isset($json['count']) || $json['count'] === '-' ) $json['count'] = 0;
    }
  }
  echo str_replace('\\/','/',json_encode($json));
  

    $ch = curl_init();
    
    $options[CURLOPT_URL] = $encUrl;  
    curl_setopt_array($ch, $options);
    
    $content = curl_exec($ch);
    $err = curl_errno($ch);
    $errmsg = curl_error($ch);
    
    curl_close($ch);
    
    if ($errmsg != '' || $err != '') {
      /*print_r($errmsg);
      print_r($errmsg);*/
    }
    echo json_encode($content);		
	}

  private function parse($encUrl){
    $options = array(
      CURLOPT_RETURNTRANSFER => true, // return web page
      CURLOPT_HEADER => false, // don't return headers
      CURLOPT_FOLLOWLOCATION => true, // follow redirects
      CURLOPT_ENCODING => "", // handle all encodings
      CURLOPT_USERAGENT => 'sharrre', // who am i
      CURLOPT_AUTOREFERER => true, // set referer on redirect
      CURLOPT_CONNECTTIMEOUT => 5, // timeout on connect
      CURLOPT_TIMEOUT => 10, // timeout on response
      CURLOPT_MAXREDIRS => 3, // stop after 10 redirects
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => false,
    );
	}	
}


/* End of file ajax.php */
/* Location: ./system/application/controllers/ajax.php */
