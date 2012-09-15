<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model {
		
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
	
	
	function getGalleries($limit=NULL){
		$entries=$this->getEntries($limit);
		$result="";
		foreach ($entries as $entry) {
			
		}
		return $result;
	}
	
	// get all postings
	private function getEntries($limit = NULL)
	{
		return $this->db->get('gallery', $limit)->result();
	}
}

/* End of file gallery_model.php */
/* Location: ./application/modules/models/gallery_model.php */