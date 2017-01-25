<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Category_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }
	
	function get_category_list($data=""){
		$this->db->select('c.*');
		$this->db->from('category as c');
        if(!empty($data['layer'])){
            $this->db->where('c.layer',$data['layer']);
        }
        if(!empty($data['status'])){
            $this->db->where('c.status',$data['status']);
        }
        //$this->db->order_by("c.id", "desc"); 
		return $this->db->get();
	}
    
    function get_category_layer(){
        $this->db->select('c.layer');
		$this->db->from('category as c');
        $this->db->group_by("c.layer"); 
		return $this->db->get();
    }
    
    function get_category_by_main($data=""){
        $this->db->select('c.*');
		$this->db->from('category as c');
        if(!empty($data['main'])){
            $this->db->where('c.parentid',$data['main']);
        }
        $this->db->order_by("c.sorting", "asc"); 
		return $this->db->get();
    }
    
	function get_category_one($id=""){
		$this->db->select('c.title,c.id,c.layer,c.sorting,c.parentid,c.uniqid_id,c.status');
		$this->db->from('category as c');
		$this->db->where('c.uniqid_id',$id);
		return $this->db->get();
	}
	
    function get_layer_options($data=""){
		$this->db->select('c.title,c.id,c.layer.c.parentid');
		$this->db->from('category as c');
		$this->db->where('c.layer',$data['layer']);
        $this->db->where('c.m_factoryID',$data['fid']);
		return $this->db->get();
	}
    
	function add_category($data){
		$results=$this->db->insert('category', $data); 
		return $results;	
	}
	
	function update_category($data,$id){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('category', $data); 
		return $results;	
	}
	
	function delete_category($id){
		$results=$this->db->delete('category', array('uniqid_id' => $id)); 
		return $results;	
	}
}
?>