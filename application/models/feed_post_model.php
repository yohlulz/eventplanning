<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed_post_model extends CI_Model {
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_site_posts($limit=NULL){
		$result="";
		$entries=$this->getEntries($limit);
		foreach ($entries as $post) {
			$result.='<div class="blog-item">
					<h4>'.$post->title.'</h4>
					<span class="blog-date">'.$post->date_post.'</span>
					<p>'.$post->text.'</p>
				</div>';
		}
		return $result;
	}
	
	function getPosts($limit=NULL){
		$result="";
		$entries=$this->getEntries($limit);
		foreach ($entries as $post) {
			$result.=
				"<item>
					<title>".$post->title."</title>
					<description>".$post->text."</description>
					<link>".site_url()."</link>
					<guid>".$post->id."</guid>
					<pubDate>".$post->date_post."</pubDate>
				</item>";
		}
		return $result;
	}
	
	// get all postings
	private function getEntries($limit = NULL)
	{
		return $this->db->get('rss_posts', $limit)->result();
	}
}

/*
<div class="blog-item">
					<h4><a href="#">Ipsum dolor sit</a></h4>
					<span class="blog-date">23.05.09</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at lobortis mauris.</p>
				</div>
				<!-- end blog roll item -->
*/
/* End of file feed_post_model.php */
/* Location: ./application/modules/models/feed_post_model.php */