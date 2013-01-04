<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People_model extends CI_Model {
		
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function getPlanners() {
		$result ='';
		$entries = $this->db->get_where('a3m_account',array("role" => "planner", "is_public" => 1))->result();
		$count =0;
		foreach ($entries as $entry) {
			$count++;
			$planner = $this->db->get_where('a3m_account_details',array('account_id' => $entry->id))->row();
			$result.='<div class="news-item">';
			$result .= '<span class="news-pointer">'.$count.'</span>';
			$result.='<div class="news-body">
						<h3>'.$planner->fullname.'</h3>
						<div class="cl">&nbsp;</div>
						<p>';
				if(isset($planner->picture)) {
					$result.='<img src="resource/user/profile/'.$planner->picture.'?t='.md5(time()).'" alt="" />';
				}
				else {
					$result.='<img src="resource/img/default-picture.gif" alt="" />';
				}
				$result.='</p>
						<div class="cl">&nbsp;</div>
					</div>
					<div class="cl">&nbsp;</div>
				</div>	
					';	
		}
		return $result;
	}
}

/* End of file people_model.php */
/* Location: ./application/models/people_model.php */