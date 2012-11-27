<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function demoLogin(){
	$CI= &get_instance();
	// 2 -> account id for demo user
	$CI->session->set_userdata('account_id', 2);
}
