<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Faq_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }
	
	function get_faq_list($data=""){
		$this->db->select('c.id,c.uniqid_id,c.title,c.status,c.content,c.create_time');
		$this->db->from('content_tab as c');
        //$this->db->where('c.fid',$data['fid']);
        $this->db->where('c.menu_id',9);
        $this->db->order_by("c.id", "desc"); 
		return $this->db->get();
	}
    
	function latest_faq(){
		$this->db->select('c.id,c.uniqid_id,c.title,c.status,c.content,c.create_time');
		$this->db->from('content_tab as c');
        $this->db->where('c.menu_id',9);
		$this->db->order_by("c.create_time", "desc"); 
		$this->db->limit(6);
		$data= $this->db->get();
		return $data;
	}
	
	function get_faq_one($id){
		$this->db->select('c.uniqid_id,c.title,c.status,c.content');
		$this->db->from('content_tab as c');
		$this->db->where('c.uniqid_id',$id);
		return $this->db->get();
	}
	
	function add_faq($data){
		$results=$this->db->insert('content_tab', $data); 
		return $results;	
	}
	
	function update_faq($data,$id){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('content_tab', $data); 
		return $results;	
	}
	
	function delete_faq($id){
		$results=$this->db->delete('content_tab', array('uniqid_id' => $id)); 
		return $results;	
	}
}
?>