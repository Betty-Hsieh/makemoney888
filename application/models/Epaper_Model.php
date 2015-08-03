<?php
class Epaper_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_epaper_list(){
		$this->db->select('eid,e_mail,e_content,e_title');
		$this->db->from('epaper_list');
		$data= $this->db->get();
		return $data;
	
	}
		
	function get_epaper_one($eid){
		$this->db->select('e_mail,e_content,e_title');
		$this->db->from('epaper_list');
		$this->db->where('eid',$eid);
		$data= $this->db->get();
		return $data;
	
	}
	
	function add_epaper($data){
		$results=$this->db->insert('epaper_list', $data); 
		return $results;	
	}
	
/*	function update_member($data,$id){
		$this->db->where('m_id', $id);
		$results=$this->db->update('member_data', $data); 
		return $results;	
	}
	
	function delete_member($id){
		$results=$this->db->delete('member_data', array('m_id' => $id)); 
		return $results;	
	}*/
}
?>