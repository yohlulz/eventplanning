<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Step_type_model extends CI_Model {
	private $name;
	private $commission;	
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('step_type_model', 'step_type');
    }
	
	function getName(){
		return $this->name;
	}
	
	function setName($name){
		$this->name=$name;
	}
	
	function getCommission(){
		return $this->commission;
	}
	
	function setCommission($commission){
		$this->commission=$commission;
	}
	
	function hasCommission(){
		return $this->commission!=0;
	}
	
	
	private function persist(){
		//TODO
	}

}

/* End of file step_type_model.php */
/* Location: ./application/modules/models/step_type_model.php */



// step:
// -descriere
// -tip - cos cumparaturi
// -data limita
// -in caz de chestii aditionale: apare un pas suplimentar cu costul aferent actiunilor suplimentare
// 
// --daca vrea sa anuleze- se sterg pasii neterminati inca
