<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myformat 
{
	/**#########################################################################
	 * # Function:															   #
	 * #			Adapts users for display								   #
	 * #########################################################################
	 */	
	public function getGallery($someParam=null)
	{
		$CI=&get_instance();
		
		$out="
		<div class=\"ad-thumbs\">
			<ul class=\"ad-thumb-list\">";
			
			$out.="<li>
						<a href=\"".$CI->uri->segment(0)."/Oana/event_mod_gallery/"."assets/images/gallery/"."album1/1.jpg\">
								<img src=\"".$CI->uri->segment(0)."/Oana/event_mod_gallery/"."assets/images/gallery/"."album1/thumbs/t1.jpg\" class=\"image0\">
						</a>
					</li>
					<li>
					  <a href=\"".$CI->uri->segment(0)."/Oana/event_mod_gallery/"."assets/images/gallery/"."album1/10.jpg\">
						<img src=\"".$CI->uri->segment(0)."/Oana/event_mod_gallery/"."assets/images/gallery/"."album1/thumbs/t10.jpg\" title=\"A title for 10.jpg\" alt=\"This is a nice, and incredibly descriptive, description of the image 10.jpg\" class=\"image1\">
					  </a>
					</li>";

			
			
			
		/*	$tmp=count($someParam['someValue']);
			if($tmp==0)
				$out.="<li>No registered users.</li>";
			for($i=0;$i<$tmp;$i++)
			{
				
			}
		*/
			$out.=
			"</ul>
		</div>";
		return $out;
	}//done
	
	
}

/* End of file myformat.php */
/* Location: ./application/libraries/myformat.php */