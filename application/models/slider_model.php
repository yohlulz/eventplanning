<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider_model extends CI_Model {
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('item_slider_model', 'item');
    }
	
	private function getSliderItems($path=''){
		if($path==''){
			return;
		}
		$result=array();
		$dir="resource/slider";
		if(!file_exists($dir."/".$path."/info.xml")){
			return;
		}
		$xml=simplexml_load_file($dir."/".$path."/info.xml");
		if($xml->getName()!="slider"){
			return;
		}
		foreach($xml->children() as $child){
			if($child->getName()!="item"){
				return;
			}
			$item=new Item_slider_model();
			$item->setPath($dir.'/'.$path.'/'.$child->path);
			foreach ($child->title->children() as $tl) {
				$item->setTitle($tl,$tl->getName());
				$item->setTitle($tl);
			}
			foreach ($child->description->children() as $desc) {
				$item->setDescription($desc,$desc->getName());
				$item->setDescription($desc);
			}
			$result[]=$item;
		}
		return $result;
	}
	
	
	function getSliders($limit=NULL,$type=''){
		$entries=$this->getEntries($limit,$type);
		$result='';
		$result.='<div id="slider">
					<div class="content">
						<ul>';
		$lang=$this->session->userdata('lang');
		if($lang==''){
			$lang='english';
			$this->session->set_userdata('lang',$lang);
		}
		foreach ($entries as $entry) {
			$items=$this->getSliderItems($entry->path);
			foreach ($items as $item) {
				$result.='	<li>
								<img src="'.$item->getPath().'" class="slide-image"/>
								<div class="text-container">
									<h2>'.$item->getTitle($lang).'</h2>
									<p>'.$item->getDescription($lang).'</p>
									<div class="cl">&nbsp;</div>
								</div>
							</li>';							
			}
		}
		$result.='		</ul>
					</div>
					<div class="nav">
						<a href="#" id="up" class="notext">&nbsp;</a>
						<a href="#" id="down" class="notext">&nbsp;</a>
					</div>
				</div>';
		return $result;
	}
	
	private function getEntries($limit = NULL,$type='')
	{
		if($type!=''){
			$this->db->where('type',$type);
		}
		return $this->db->get('slider_entries', $limit)->result();
	}
}

/* End of file slider_model.php */
/* Location: ./application/modules/models/slider_model.php */
