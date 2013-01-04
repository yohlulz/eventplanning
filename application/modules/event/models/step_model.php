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
	
	function getByType($entryId,$type=''){
		return $this->db->like('type', $type)->where('entry_id', $entryId)->get('event_step')->result();
	}
	
	public function getActionsForStep($steps, $index, $size) {
		$step = $steps[$index];
		$result = '<ul class="event_actions">';
		$result.='<li class="status-'.$step->status.'" id='.$step->id.' title="'.lang("notification_status_".$step->status).'"></li>';
		if($step->status === 'not_started') {
			if($size > 1) {
				$result.='<li class="delete-step" id='.$step->id.' title="'.lang("notification_delete_step").'"></li>';
			}
			$result.='<li class="start_step" id='.$step->id.' title="'.lang("notification_start_step").'"></li>';
		}
		if($step->status === 'over') {
			$result.='<li class="confirm-step" id='.$step->id.' title="'.lang("notification_finished").'"></li>';
		}
		if($step->status != 'not_started' && $step->status != 'over') {
			$result.='<li class="planner" id='.$step->id.' title="'.lang("notification_planner").'"></li>';
		}
		$result.= '</div>';
		return $result;
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
