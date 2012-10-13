<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model {
		
	private $steps;
	private $index;
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('event/step_model', 'step');
		$this->load->model('gallery_model', 'gallery');
		$this->steps=array();
		$this->index=-1;
    }
	
/*	function addStep($step){
		$this->steps[]=$step;
	}
	
	function nextStep(){
		if(!$this->steps[$this->index]->isDone()){
			throw new Exception(lang('step_not_done'));
		}
		if($this->isTerminated()){
			throw new Exception(lang('no_more_steps'));
		}
		$this->index++;
	}
	
	function previousStep(){
		if($this->index==0){
			throw new Exception(lang('no_more_steps'));
		}
		$this->index--;
	}
	
	function isTerminated(){
		return count($this->steps)==$this->index+1;
	}
	
	function removeCurrentStep(){
		if($this->steps[$this->index]->isDone()){
			throw new Exception(lang('step_completed'));
		}
		unset($this->steps[$this->index]);
		$this->steps=array_values($this->steps);
		if($this->index==count($this->steps)){
			$this->index--;
		}
	}
	
	function cancelAllRemaining(){
		$this->index=0;
		foreach ($this->steps as $step) {
			if(!$step->isDone()){
				$this->removeCurrentStep();
			}
			$this->index++;
		}
	}*/
	
	public static function getStepsForType($type,$current='nothing'){
		$CI=&get_instance();
		$data['current']=$current;
		$data['type']=$type;
		$result=$CI->load->view('event_menu',$data,true);
		$result.='<div class="welcome">';
		$defaults=$CI->db->where('eventName',$type)->get('event_type_default_steps')->result();
		$available=$CI->db->where('eventName',$type)->get('event_type_available_steps')->result();
		$result.='<ul id="selectedSortableList" class="connectedSortable" url="'.site_url('event/steps/submit_new_event/'.$type).'">
					<li class="headingSortable ui-state-disabled">'.lang('selected_items').'</li>';
		$least=false;			
		foreach ($defaults as $entry) {
			$disabled='';
			if($entry->implicit==1){
				$disabled=' ui-state-disabled';
			}
			$result.='<li class="ui-state-highlight step_item'.$disabled.'">'.$entry->stepName.'</li>';
			$least=true;
		}
		if(!$least){
			$result.='<li class="ui-state-disabled">'.lang('no_items_available').'</li>';
		}
		$result.='</ul>
				  <ul id="availableSortableList" class="connectedSortable">
				  	<li class="headingSortable ui-state-disabled">'.lang('available_items').'</li>';
		$least=false;
		foreach ($available as $entry) {
			$result.='<li class="ui-state-default step_item">'.$entry->stepName.'</li>';
			$least=true;
		}
		if(!$least){
			$result.='<li class="ui-state-disabled">'.lang('no_items_available').'</li>';
		}		  
		$result.='</ul>
				<div class="cl">&nbsp;</div>
				<div class="btn round_corners event_submit" id="event_create_steps">'.lang('submit_create_event').'</div>
				<div class="cl">&nbsp;</div>
				</div>';
		return $result;
	}

	public function getRunningEvents($userId,$type,$current='nothing',$gmap){
		$CI=&get_instance();
		$data['current']=$current;
		$data['type']=$type;
		$result=$CI->load->view('event_menu',$data,true);
		$result.='<div class="welcome">';
		$events=$this->getByType($userId, $type);
		$headers='<tr>
					<th>'.lang('table_index').'</th>
					<th>'.lang('table_id').'</th>
					<th>'.lang('table_date').'</th>
					<th>'.lang('table_sum').'</th>
					<th>'.lang('table_place').'</th>
					<th>'.lang('table_status').'</th>
				</tr>';
		
		$result.='<table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable1">
					<thead>'.$headers.'</thead><tbody>';
		$count=1;
		foreach ($events as $event) {
			if($event->status=='new' || $event->status=='running'){
				if($event->place){
					$place=$this->db->get_where('event_place',array('id' => $event->place))->row();
				}
				$result.='	<tr class="gradeA">
							<td class="center1">'.$count.'</td>
							<td class="center1">'.$event->id.'</td>
							<td class="center1">'.$event->submit_date.'</td>
							<td class="center1">'.$event->total_cost.'</td>';
				if($event->place){
					$tmp_rs='';
					if($gmap!='nothing'){
						$tmp_rs='clicked';
					}
					$result.='<td id="gmap-container-td-id'.$count.'" class="center1 table_gmap_icon '.$tmp_rs.'" title="'.$place->name.'" url="'.
									site_url('event/steps/edit_event/'.$type.'/'.$count).'#main_menu" url_clicked="'.
									site_url('event/steps/edit_event/'.$type).'#main_menu">';
					if($gmap==$count){
						$result.=$this->getGmapSubmenu($event->place);
					}
					$result.='</td>';
				}	
				else{
					$result.='<td></td>';
				}
					$result.='<td class="center1 status_'.$event->status.'">'.lang('status_'.$event->status).'</td>
						</tr>';
			}
			$count++;
		}			
		$result.='</tbody><tfoot>'.$headers.'</tfoot></table>';
		
		$result.='<div class="cl">&nbsp;</div>
					</div>';
		return $result;
	}

private function getGmapSubmenu($id){
	$entry=$this->db->get_where('event_place',array('id' => $id))->row();
	$result='<div class="gmap_container_submenu">
    				<div class="triangle1"></div>';
	$result.='<div class="gmap-container" id="gmap-container-id'.$id.'" view="normal" value="'.$entry->address.'" title="'.$entry->name.'" gmap-width="230" gmap-height="200"></div>';	
	$result.='</div>';
	return $result;	
}

	public function getEndedEvents($userId,$type,$current='nothing'){
		//TODO refactor
		$CI=&get_instance();
		$data['current']=$current;
		$data['type']=$type;
		$result=$CI->load->view('event_menu',$data,true);
		$result.='<div class="welcome">';
		$events=$this->getByType($userId, $type);
		$headers='<tr>
					<th>'.lang('table_index').'</th>
					<th>'.lang('table_id').'</th>
					<th>'.lang('table_date').'</th>
					<th>'.lang('table_sum').'</th>
					<th>'.lang('table_place').'</th>
					<th>'.lang('table_status').'</th>
				</tr>';
		
		$result.='<table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable1">
					<thead>'.$headers.'</thead><tbody>';
		$count=1;
		foreach ($events as $event) {
			if($event->status=='finished' || $event->status=='canceled'){
				$result.='	<tr class="gradeA">
							<td class="center1">'.$count++.'</td>
							<td class="center1">'.$event->id.'</td>
							<td class="center1">'.$event->submit_date.'</td>
							<td class="center1">'.$event->total_cost.'</td>
							<td>'.$event->place.'</td>
							<td class="center1 status_'.$event->status.'">'.lang('status_'.$event->status).'</td>
						</tr>';
			}
		}			
		$result.='</tbody><tfoot>'.$headers.'</tfoot></table>';
		
		$result.='<div class="cl">&nbsp;</div>
					</div>';
		return $result;
	}
	
	public static function getHeadings($type,$gallery=false,$cart=false){
		$CI =&get_instance();
		$data['current']='nothing';
		$data['type']=$type;
		$result=$CI->load->view('event_menu',$data,true);
		if($gallery){
			$result.=$CI->gallery->getGalleries(MEDIUM_LOAD_ITEMS,$type,$cart);
		}
		return $result;
	}

	public function create($steps,$userId,$type){
		if(count($steps)<1){
			return -1;
		}
		$this->load->helper('date');
		$this->db->insert('event_entry', array(
			'user_id' => $userId, 
			'type' => $type, 
			'submit_date' => mdate('%Y-%m-%d %H:%i:%s', now())
		));
		$result=$this->db->insert_id();
		foreach ($steps as $step) {
			$this->addStep($result,$step);
		}
		return $result;
	}
	
	private function addStep($entryId,$stepType){
		$step_id=$this->step->create($entryId,$stepType);
		$steps[]=$this->step->getById($step_id);
		return $step_id;
	}

	public function getById($id){
		return $this->db->get_where('event_entry', array('id' => $id))->row();
	}
	
	public function getByType($userId,$type){
		return $this->db->get_where('event_entry',array('user_id' => $userId, 'type' => $type))->result();
	}
	
	public function save(){
		//TODO
	}
	
	private function persist(){
		//TODO
	}

	public function renderSteps(){
		//TODO
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
