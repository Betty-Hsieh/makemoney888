<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Software_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }
	
	function get_software_list(){
		$this->db->select('product_title,product_content,product_price,read_count,read_count,create_time');
		$this->db->from('pos_products');
        $this->db->where('type','software');
        $this->db->order_by("create_time", "desc");
		$data= $this->db->get();
		return $data;
	}
	
	function latest_software(){
		$this->db->select('product_title,product_content,product_price,read_count,read_count,create_time');
		$this->db->from('pos_products');
		$this->db->order_by("create_time", "desc"); 
		$this->db->limit(4);
		$data= $this->db->get();
		return $data;
	}
	
	function get_software_one($id){
		$this->db->select('product_title,product_content,product_price,read_count,read_count');
		$this->db->from('pos_products');
		$this->db->where('id',$id);
		return $this->db->get();
	}
	
	function add_software($data){
		$results=$this->db->insert('pos_products', $data); 
		return $results;	
	}
	
	function update_software($data,$id){
		$this->db->where('id', $id);
		$results=$this->db->update('pos_products', $data); 
		return $results;	
	}
	
	function delete_software($id){
		$results=$this->db->delete('pos_products', array('id' => $id)); 
		return $results;	
	}
}
?>