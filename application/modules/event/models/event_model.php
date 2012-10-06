<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model {
		
	private $steps;
	private $index;
	private $type;
	private $user;
	private static $table='';
		
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
		$result.='<ul id="selectedSortableList" class="connectedSortable">
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
	
	public function save(){
		//TODO
	}
	
	private function persist(){
		//TODO
	}

	public function renderSteps(){
		
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
