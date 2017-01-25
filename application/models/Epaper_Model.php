<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Epaper_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_epaper_list(){
		$this->db->select('uniqid,current_date,eid,title,content,status');
		$this->db->from('epaper_list');
		$data= $this->db->get();
		return $data;
	
	}
		
	function get_epaper_one($eid){
		$this->db->select('uniqid,current_date,eid,title,content,status');
		$this->db->from('epaper_list');
		$this->db->where('uniqid',$eid);
		$data= $this->db->get();
		return $data;
	
	}
	
	function add_epaper($data){
		$results=$this->db->insert('epaper_list', $data); 
		return $results;	
	}
	
	function update_epaper($data,$id){
		$this->db->where('m_id', $id);
		$results=$this->db->update('epaper_list', $data); 
		return $results;	
	}
	
	function delete_epaper($id){
		$results=$this->db->delete('epaper_list', array('m_id' => $id)); 
		return $results;	
	}
}
?>