<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Step_model extends CI_Model {
	private $type;
	private $dueDate;
	private $description;	
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function create($type,$dueDate,$description=''){
		$this->type=$type;
		$this->dueDate=$dueDate;
		$this->description=$description;
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
