<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getPublicEventsForHome(){
	$CI=&get_instance();
	$result = '<div class="news">';
	$entries = $CI->db->get('public_events')->result();
	$result.=getRssPosts();
	foreach($entries as $entry) {
		$result.=	'<div class="news-item">
					<span class="news-pointer-date">'. date_format(date_create($entry->due_date), 'j M Y').'</span>
					<div class="news-body">
						<h3>'. $entry->name .'</h3>'.getPlace($entry->name).
						'<div class="cl">&nbsp;</div>
					</div>
					<div class="cl">&nbsp;</div>
				</div>';	
	}
	$result.= '</div>';
	return $result;
}

function getRssPosts($limit=MEDIUM_LOAD_ITEMS,$type='event_public') {
	$CI=&get_instance();
	$result = '';
	$CI->db->where('type',$type);
	$entries = $CI->db->get('rss_posts',$limit)->result();
	foreach($entries as $entry) {
		$result.=	'<div class="news-item">
					<span class="news-pointer-date">'. date_format(date_create($entry->date_post), 'j M Y').'</span>
					<div class="news-body">
						<h3>'. $entry->title .'</h3><div class="cl">&nbsp;</div>
						<p>'. $entry->text .'</p>
						<div class="cl">&nbsp;</div>
					</div>
					<div class="cl">&nbsp;</div>
				</div>';
	}
	return $result;
}
