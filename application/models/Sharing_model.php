<?php
class Sharing_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_sharing_list($data=""){
		$this->db->select('title,content,uniqid_id,status,create_time,read_count');
		$this->db->from('content_tab');
        $this->db->where('type','UserFeedback');
		$data= $this->db->get();
		return $data;
	}
    
    function latest_sharing(){
		$this->db->select('title,content,uniqid_id');
		$this->db->from('content_tab');
        $this->db->where('type','UserFeedback');
		$this->db->order_by("create_time", "desc"); 
		$this->db->limit(3);
		$data= $this->db->get();
		return $data;
	}
	
	function add_sharing($data=""){
		$results=$this->db->insert('content_tab', $data); 
		return $results;	
	}
	
    function get_sharing_by_uniqid($id){
		$this->db->select('title,content,uniqid_id,status,create_time,read_count,picture,subtype');
		$this->db->from('content_tab');
		$this->db->where('uniqid_id',$id);
		$data= $this->db->get();
		return $data;
	}
    
    
	function update_sharing($data="",$id=""){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('content_tab',$data); 
		return $results;	
	}
	
	function delete_sharing($id){
		$results=$this->db->delete('content_tab', array('uniqid_id' => $id)); 
		return $results;	
	}
}
?>