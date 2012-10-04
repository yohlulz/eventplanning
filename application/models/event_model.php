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
		$this->load->model('step_model', 'step');
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
	
	public static function createEvent($type,$accountId){
		$event=new Event_model();
		$event->type=$type;
		$event->user=$accountId;
		
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
