<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Step_model extends CI_Model {
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('gallery_model', 'gallery');
		
    }
	
	function create($entryId,$type){
		$this->db->insert('event_step', array(
			'entry_id' => $entryId, 
			'type' => $type 
		));
		return $this->db->insert_id();
	}
	
	function delete($id) {
		$this->db->delete('event_step', array('id' => $id));
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
				$result.='<li id='.$step->id.' title="'.lang("notification_delete_step").'">'.anchor('event/steps/action/ccst/'.$step->id.'/steps','&nbsp;','class="delete-step"').'</li>';
			}
			$result.='<li id='.$step->id.' title="'.lang("notification_start_step").'">'.anchor('event/steps/details/start/'.$step->id.'#start_step','&nbsp;','class="start_step"').'</li>';
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
	
	public function setValue($key, $value, $id) {
		$this->db->where('id', $id)->update('event_step', array($key => $value)); 
	}
	
	public function getFormForType($id) {
		$step = $this->getById($id);
		$type = $step->type;
		$result = '';
		if($type === 'location') {
			$result .='<form method="POST" action="'.site_url('event/steps/submit_form').'">
							Name<br/><input type="text" name="name" size="30"/><br/><br/>
							Address<br/><input type="text" name="address" size="80" /><br/><br/><br/>
							<input type="hidden" name="id" value="'.$id.'"/>
							<input type="hidden" name="status" value="over"/>
							<input type="submit" value="Save" class="btn"/><br/>
						</form><br/>
			';
			
			$result.='<div id="gmapSearchAddress1"></div>';
		}else
		if($type === 'custom' || $type === 'planner') {
			//TODO
		}
		else { //every other type -> photo gallery
			$entries = $this->db->query('SELECT id FROM event_step WHERE `entry_id` ='.$step->entry_id)->result();
			$index = 0;
			foreach ($entries as $entry) {
				$index ++;
				if($entry->id == $step->id) {
					break;
				}
			}
			$result.= $this->gallery->getGalleries(NULL,'step_type',true,$type,$index);
			$result.='<form method="POST" action="'.site_url('event/steps/submit_form').'" id="submit_add_step" style="display:none;">
						<input type="hidden" name="id" value="'.$id.'">
						<input type="hidden" name="status" value="running">
					</form>';
		}		
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
