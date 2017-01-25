<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Customertype_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_customertype_list(){
		$this->db->select('*');
		$this->db->from('customer_type');
		return $this->db->get();
	}
    
	function get_customertype_one($id){
		$this->db->select('*');
		$this->db->from('customer_type');
		$this->db->where('id',$id);
		return $this->db->get();
	}
    
    
	function add_customertype($data){
		$results=$this->db->insert('customer_type', $data); 
		return $results;	
	}
	
	function update_customertype($data,$id){
		$this->db->where('id', $id);
		$results=$this->db->update('customer_type', $data); 
		return $results;	
	}
	
	function delete_customertype($id){
		$rs=$this->db->delete('customer_type', array('id' => $id)); 
		return $rs;	
	}
    
}
?>