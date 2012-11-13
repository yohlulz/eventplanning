<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Step_model extends CI_Model {
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function create($entryId,$type){
		$this->db->insert('event_step', array(
			'entry_id' => $entryId, 
			'type' => $type 
		));
		return $this->db->insert_id();
	}

	public function getById($id){
		return $this->db->get_where('event_step', array('id' => $id))->row();
	}
	
	function isDone($id){
		$step=$this->getById($id);
		return $step->terminated==1;
	}
	
	function getByType($entryId,$type){
		return $this->db->get_where('event_step',array('entry_id' => $entryId, 'type' => $type))->result();
	}
}

/*
 * TODO 
 * chestionar - intrebari in fctie de intrebari 
 * 
 * /

/* End of file event_model.php */
/* Location: ./application/modules/models/event_model.php */







// step:
// -descriere
// -tip - cos cumparaturi
// -data limita
// -in caz de chestii aditionale: apare un pas suplimentar cu costul aferent actiunilor suplimentare
// 
// --daca vrea sa anuleze- se sterg pasii neterminati inca
