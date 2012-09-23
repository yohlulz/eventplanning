<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model {
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('picture_gallery_model', 'picture');
    }
	
	private function getPictures($path=''){
		if($path==''){
			return;
		}
		$result=array();
		$dir="resource/gallery";
		if(!file_exists($dir."/".$path."/info.xml")){
			return;
		}
		$xml=simplexml_load_file($dir."/".$path."/info.xml");
		if($xml->getName()!="gallery"){
			return;
		}
		foreach($xml->children() as $child){
			if($child->getName()!="item"){
				return;
			}
			$picture=new Picture_gallery_model();
			$picture->setPath($dir.'/'.$path.'/'.$child->path);
			$picture->setThumb($dir.'/'.$path.'/'.$child->thumb);
			$picture->setTitle($child->title);
			$picture->setDescription($child->description);
			if(isset($child->id)){
				$picture->setCartId($child->id);
			}
			if(isset($child->name)){
				$picture->setCartName($child->name);
			}
			if(isset($child->price)){
				$picture->setCartPrice($child->price);
			}
			if(isset($child->shipping)){
				$picture->setCartShipping($child->shipping);
			}
			$result[]=$picture;
		}
		return $result;
	}
	
	
	function getGalleries($limit=NULL,$type='',$cart=false){
		$entries=$this->getEntries($limit,$type);
		$result='';
		foreach ($entries as $entry) {
			if($entry->picture==1){
				$pictures=$this->getPictures($entry->path);
				$havePictures=count($pictures)>0;
				if(!$havePictures){
					continue;
				}
				$result.='
					<div class="news-item">
						<span class="news-pointer-date"><b>'.$entry->date_month.'</b> <i>'.$entry->year.'</i></span>
						<div class="news-body">
							<h3>'.$entry->title.'</h3>
							<a href="#" class="btn"><span><em>read more</em></span></a>
							<div class="cl">&nbsp;</div>
							<p>'.$entry->comment.'</p>
						</div>
						<div class="ad-gallery">
							<div class="ad-image-wrapper"></div>
							<div class="ad-controls">';
							if($cart){
							$result.='<div class="cart-image" id="cart-container-id1">No Cost</div>';						
							}
						$result.='<select id="switch-effect">
      								<option value="slide-hori">Slide horizontal</option>
									<option value="slide-vert">Slide vertical</option>
									<option value="resize">Shrink/grow</option>
									<option value="fade">Fade</option>
    							</select>
    						</div>
							<div class="ad-nav">
        						<div class="ad-thumbs">
									<ul class="ad-thumb-list">';
				foreach ($pictures as $picture) {
					$result.='	<li>
              						<a href="'.$picture->getPath().'"><img src="'.$picture->getThumb().'" title="'.$picture->getTitle().'" alt="'.$picture->getDescription().'" ';
						if($picture->getCartId()!=''){
							$result.='cart_id="'.$picture->getCartId().'" ';
						}
						if($picture->getCartName()!=''){
							$result.='cart_name="'.$picture->getCartName().'" ';
						}
						if($picture->getCartPrice()!=''){
							$result.='cart_price="'.$picture->getCartPrice().'" ';
						}
						if($picture->getCartShipping()!=''){
							$result.='cart_shipping="'.$picture->getCartShipping().'" ';
						}	
						$result.='class="image_picture"></a>
            					</li>';
				}
					$result.='</ul>
							</div>
						</div>
					</div>
					<div class="cl">&nbsp;</div>
				</div>';
			}
			else{
				$result.='<div class="news-item">
							<span class="news-pointer-date"><b>'.$entry->date_month.'</b> <i>'.$entry->year.'</i></span>
							<div class="news-body">
								<h3>'.$entry->title.'</h3>
								<a href="#" class="btn"><span><em>read more</em></span></a>
								<div class="cl">&nbsp;</div>
								<p>'.$entry->comment.'</p>
							</div>
							<div class="youtube-player-container" id="youtube-player-id'.$entry->id.'" v="'.$entry->path.'"></div>
							<div class="cl">&nbsp;</div>
						</div>';
			}
		}
		return $result;
	}
	
	private function getEntries($limit = NULL,$type='')
	{
		if($type!=''){
			$this->db->where('event_type',$type);
		}
		return $this->db->get('gallery', $limit)->result();
	}
}

/* End of file gallery_model.php */
/* Location: ./application/modules/models/gallery_model.php */
