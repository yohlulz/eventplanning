<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Picture_gallery_model extends CI_Model {
	private $path;
	private $thumb;
	private $title;
	private $description;
	private $id;
	private $name;
	private $price;
	private $shipping;
	
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function setPath($path){
		$this->path=$path;
	}
	
	function setThumb($thumb){
		$this->thumb=$thumb;
	}
	
	function getPath(){
		return $this->path;
	}
	
	function getThumb(){
		return $this->thumb;
	}
	
	function setTitle($title){
		$this->title=$title;
	}
	
	function getTitle(){
		return $this->title;
	}
	
	function setDescription($desc){
		$this->description=$desc;
	}
	
	function getDescription(){
		return $this->description;
	}
	
	function setCartId($id){
		$this->id=$id;
	}
	
	function getCartId(){
		return $this->id;
	}
	
	function setCartName($name){
		$this->name=$name;
	}
	
	function getCartName(){
		return $this->name;
	}
	
	function setCartPrice($price){
		$this->price=$price;
	}
	
	function getCartPrice(){
		return $this->price;
	}
	
	function setCartShipping($shipping){
		$this->shipping=$shipping;
	}
	
	function getCartShipping(){
		return $this->shipping;
	}
}


/* End of file picture_gallery_model.php */
/* Location: ./application/modules/models/picture_gallery_model.php */