<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Student_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_student_list(){
		$this->db->select('*');
		$this->db->from('org_member');
		return $this->db->get();
	}
    
	function get_student_one($id){
		$this->db->select('*');
		$this->db->from('org_member');
		$this->db->where('org_mid',$id);
		return $this->db->get();
	}
    
    function get_student_by_email($email){
		$this->db->select('*');
		$this->db->from('org_member');
		$this->db->where('org_email',$email);
		return $this->db->get();
	}
    
	function add_student($data){
		$results=$this->db->insert('org_member', $data); 
		return $results;	
	}
	
	function update_student($data,$id){
		$this->db->where('org_mid', $id);
		$results=$this->db->update('org_member', $data); 
		return $results;	
	}
	
	function delete_student($id){
		$rs=$this->db->delete('org_member', array('org_mid' => $id)); 
		return $rs;	
	}
    
    function verify_student($data=''){
        $this->db->select('org_mid,org_email,org_name');
        $this->db->from('org_member');
		$this->db->where('org_email',$data['email']);
        $this->db->where('org_password', $data['password']);
        $data= $this->db->get();
			
		return $data;	
	}
    
    
    function get_customer_type_list(){
        $this->db->select('*');
		$this->db->from('customer_type');
		return $this->db->get();
    }
}
?>