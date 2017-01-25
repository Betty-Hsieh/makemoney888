<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Service_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }
	
	function get_service_list(){
		$this->db->select('topic,name,email,content,id,status,create_time,manager_status');
		$this->db->from('message');
		$data= $this->db->get();
		return $data;
	}
	
	
	function get_service_one($id){
		$this->db->select('topic,name,email,content,id,status,create_time,manager_status');
		$this->db->from('message');
		$this->db->where('id',$id);
		return $this->db->get();
	}
	
	function add_service($data){
		$results=$this->db->insert('message', $data); 
		return $results;	
	}
	
	function update_service($data,$id){
		$this->db->where('id', $id);
		$results=$this->db->update('message', $data); 
		return $results;	
	}
	
	function delete_service($id){
		$results=$this->db->delete('message', array('id' => $id)); 
		return $results;	
	}
}
?>