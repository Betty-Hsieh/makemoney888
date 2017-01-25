<?php
class Strategery_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_strategery_list($data=""){
		$this->db->select('id,price,amount,title,create_time,uniqid_id,status,pid');
		$this->db->from('strategery');
        if(!empty($data['where_in'])){
            $this->db->where_in('uniqid_id',$data['where_in']);
        }
		return $this->db->get();
	}
	
	function add_strategery($data){
		$results=$this->db->insert('strategery', $data); 
		return $results;
	}
	
    function get_strategery_group($id=""){
        $this->db->select('uniqid_id,id,price,amount,pid,amount,status,title');
		$this->db->from('strategery');
        $this->db->like('pid', $id);
		return $this->db->get();
    }
    
    function get_strategery_by_uniqid($id=""){
		$this->db->select('*');
		$this->db->from('strategery');
		$this->db->where('uniqid_id',$id);
		$data= $this->db->get();
		return $data;
	}
    
	function get_strategery_one($id=""){
		$this->db->select('*');
		$this->db->from('strategery');
		$this->db->where('uniqid_id',$id);
		return $this->db->get();
	}	
    
	function update_strategery($data="",$id=""){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('strategery',$data); 
		return $results;	
	}
	
	function delete_strategery($id=""){
		$results=$this->db->delete('strategery', array('uniqid_id' => $id)); 
		return $results;	
	}
}
?>