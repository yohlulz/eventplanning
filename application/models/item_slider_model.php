<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_slider_model extends CI_Model {
	private $path;
	private $title;
	private $description;
	private $DEFAULT="def";	
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->title=array();
		$this->description=array();
    }
	
	function setPath($path){
		$this->path=$path;
	}
	
	function getPath(){
		return $this->path;
	}
	
	function setTitle($title,$lang=''){
		$this->title[$lang==''?$this->DEFAULT:$lang]=$title;
	}
	
	function getTitle($lang=''){
		if(!array_key_exists($lang,$this->title)){
			return $this->title[$this->DEFAULT];
		}
		return $this->title[$lang];
	}
	
	function setDescription($desc,$lang=''){
		$this->description[$lang==''?$this->DEFAULT:$lang]=$desc;
	}
	
	function getDescription($lang=''){
		if(!array_key_exists($lang,$this->title)){
			return $this->description[$this->DEFAULT];
		}
		return $this->description[$lang];
	}
}


/* End of file item_slider_model.php */
/* Location: ./application/modules/models/item_slider_model.php */