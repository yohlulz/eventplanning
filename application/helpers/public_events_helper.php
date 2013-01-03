<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getPublicEventsForHome(){
	$CI=&get_instance();
	$result = '<div class="news">';
	$entries = $CI->db->get('public_events')->result();
	foreach($entries as $entry) {
		$result.=	'<div class="news-item">
					<span class="news-pointer-date">'. date_format(date_create($entry->due_date), 'j M Y').'</span>
					<div class="news-body">
						<h3>'. $entry->name .'</h3>'.getPlace('Iulius Mall').
						'<div class="cl">&nbsp;</div>
					</div>
					<div class="cl">&nbsp;</div>
				</div>';	
	}
	$result.= '</div>';
	return $result;
}
