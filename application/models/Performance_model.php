<?php
class Performance_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_performance_list($data=""){
		$this->db->select('*');
		$this->db->from('main_transation');
        
        if(isset($data['status'])){
            $this->db->where('status',$data['status']);
        }
        
        if(!empty($data['start']) && !empty($data['end'])){
            $this->db->where("DATE(create_time) BETWEEN '".$data['start']."' AND '".$data['end']."'");
        }
        
        if(!empty($data['limit'])){
            $this->db->limit($data['limit']);
        }
       	//$this->db->order_by("create_time", "desc");
		return $this->db->get();
	}
	
	function add_main_transation($data=""){
		$results=$this->db->insert('main_transation', $data); 
		return $results;	
	}
	
    function get_main_transation_by_uniqid($id){
		$this->db->select('*');
		$this->db->from('main_transation');
		$this->db->where('uniqid_id',$id);
		$data= $this->db->get();
		return $data;
	}
    
    function query_main_transation($data=""){
		$this->db->select('main_transation_title,member_price,uniqid_id,main_transation_price,dis_price,status,picture');
		$this->db->from('main_transation');
        $this->db->like('main_transation_title', $data['main_transation_name'], 'both'); 
		return $this->db->get();
	}
    
	function update_main_transation($data="",$id=""){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('main_transation',$data); 
		return $results;	
	}
	
	function delete_main_transation($id){
		$results=$this->db->delete('main_transation', array('uniqid_id' => $id)); 
		return $results;	
	}
}
?>