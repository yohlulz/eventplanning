<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed_post_model extends CI_Model {
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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

 <item>
          <title>Your first feed file goes here</title>
          <description>A brief description of the file goes here</description>
          <link>http://www.yourdomain.com/rssfeedfolder/file1.html</link>
          <guid isPermaLink="true">http://www.yourdomain.com/rssfeedfolder/file1.html</guid>
          <pubDate>Tue, 04 Dec 2007 09:19:42 CST</pubDate>
          <source url="http://www.rssFeedFolder.com/">rssFeedFolder.com</source>
        </item>
*/
/* End of file feed_post_model.php */
/* Location: ./application/modules/models/feed_post_model.php */