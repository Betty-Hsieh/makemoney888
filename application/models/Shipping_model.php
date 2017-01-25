<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Shipping_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }
	
	function get_shipping_list($data=""){
		$this->db->select('*');
		$this->db->from('keyvalue');
        
        if(!empty($data['fkey']) ){
            $this->db->where('fkey',$data['fkey']);
        }
		return $this->db->get();
	}
	
	function get_shipping_one($id){
		$this->db->select('*');
		$this->db->from('keyvalue');
		$this->db->where('kv',$id);
		return $this->db->get();
	}
    
    //透過關鍵值查詢
    function get_shipping_by_key($key=""){
		$this->db->select('*');
		$this->db->from('keyvalue');
		$this->db->where('fkey',$key);
		return $this->db->get();
	}
	
	function add_shipping($data){
		$results=$this->db->insert('keyvalue', $data); 
		return $results;	
	}
	
	function update_shipping($data,$id){
		$this->db->where('kv', $id);
		$results=$this->db->update('keyvalue', $data); 
		return $results;	
	}
	
	function delete_shipping($id){
		$results=$this->db->delete('keyvalue', array('id' => $id)); 
		return $results;	
	}
}
?>