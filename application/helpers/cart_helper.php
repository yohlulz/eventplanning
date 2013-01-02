<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(! function_exists('checkLanguage')){
	function checkLanguage()
	{
		$CI=&get_instance();
		$CI->load->library('session');
		$tmp=$CI->session->userdata('lang');
		if(isset($tmp)){
			return $tmp;
		}
		return "en";
	}
}

function getConfigItem($item){
	$CI= &get_instance();
	return $CI->config->item($item);
}

function getCart(){
	$CI=&get_instance();
	$CI->load->library('session');
	$tmp=$CI->session->userdata('cart');
	if(!isset($tmp)){
		$tmp=false;
		$CI->session->set_userdata('cart',$tmp);
	}
	return $tmp;
}

function setCart($value=''){
	$tmpValue=$value;
	$CI=&get_instance();
	$CI->load->library('session');
	$tmp=$CI->session->userdata('cart');
	if($tmp=='' && $tmpValue==''){
		$tmpValue=false;
	}
	$CI->session->set_userdata('cart',$tmpValue);
}
