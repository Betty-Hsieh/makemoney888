<?php
class Member_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_member_list(){
		$this->db->select('m_id,m_factoryID,m_email,m_password,m_name');
		$this->db->from('member_data');
		$this->db->limit(10, 20);
		$data= $this->db->get();
		return $data;
	
	}
	
	function get_member_one($id){
		$this->db->select('m_id,m_factoryID,m_email,m_password,m_name');
		$this->db->from('member_data');
		$this->db->where('m_id',$id);
		$data= $this->db->get();
		return $data;
	
	}
	
	function add_member($data){
		$results=$this->db->insert('member_data', $data); 
		return $results;	
	}
	
	function update_member($data,$id){
		$this->db->where('m_id', $id);
		$results=$this->db->update('member_data', $data); 
		return $results;	
	}
	
	function delete_member($id){
		$results=$this->db->delete('member_data', array('m_id' => $id)); 
		return $results;	
	}
}
?>