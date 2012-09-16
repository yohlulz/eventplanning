<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('getPlace'))
{
    function getPlace($place,$view="normal",$width=350,$height=250)
    {
		$CI = & get_instance();
		$result='';
		$entries=$CI->db->like('name',$place)->get('event_place')->result();
		foreach ($entries as $entry) {
			$result.='<div class="gmap-container" id="gmap-container-id'.$entry->id.'" view="'.$view.'" value="'.$entry->address.'" title="'.$place.'" gmap-width="'.$width.'" gmap-height="'.$height.'"></div>';
		}
		return $result;
    }      
}

/* End of file places_helper.php */
/* Location: ./application/helpers/places_helper.php */
