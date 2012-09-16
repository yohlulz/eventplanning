<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('getSubmenus'))
{
    function getSubmenus()
    {
 		$result='';
		$result.=getEventsSubmenu();
		$result.=getServiceSubmenu();       
		return $result;
    }      
}

function getEventsSubmenu(){
	$CI =& get_instance();
	$result='';
	$entries=$CI->db->get('event_type')->result();
	$result.='<div class="events_submenu">
    				<div class="triangle"></div>';
	foreach($entries as $entry){
		$result.='<a href="'.$entry->url.'">'.lang($entry->name).'</a>';	
	}
	$result.='</div>';
	return $result;
}

function getServiceSubmenu(){
	$CI =& get_instance();
	$result='';
	$result.='<div class="service_submenu">
    				<div class="triangle"></div>';
	//TODO	
	$result.='
    		<a href="#" class="menu_top">...</a>
    		<a href="#">...</a>
    		<a href="#" class="menu_bottom">...</a>';

	$result.='</div>';
	return $result;	
}

/* End of file submenu_helper.php */
/* Location: ./application/helpers/submenu_helper.php */
