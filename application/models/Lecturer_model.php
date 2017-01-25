<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Lecturer_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
    
	//teacher list
	function get_Lecturer_list(){
		$this->db->select('m_id,m_name,m_email,status,picture,introduction');
		$this->db->from('member_data');
        $this->db->where('permissions_id',119);
		$data= $this->db->get();
		return $data;
	}
	
	function get_author_list(){
		$this->db->select('m_id,m_name,m_email,picture');
		$this->db->from('member_data');
		$data= $this->db->get();
		return $data;
	}
	
	function get_Lecturer_one($id=""){
		$this->db->select('m_id,m_name,m_email,m_password,status,introduction,picture');
		$this->db->from('member_data');
		$this->db->where('m_id',$id);
		$data= $this->db->get();
		return $data;
	}
	
	function add_Lecturer($data){
		$results=$this->db->insert('member_data', $data); 
		return $results;	
	}
	
	function update_Lecturer($data,$id){
		$this->db->where('m_id', $id);
		$results=$this->db->update('member_data', $data); 
		return $results;	
	}
	
	function delete_Lecturer($id){
		$rs=$this->db->delete('member_data', array('m_id' => $id)); 
		return $rs;	
	}
    
    function verify_Lecturer($data=''){
        $this->db->select('m_id,m_email,m_name');
        $this->db->from('member_data');
		$this->db->where('m_email',$data['email']);
        $this->db->where('m_password', $data['password']);
        $data= $this->db->get();		
		return $data;	
	}
}
?>