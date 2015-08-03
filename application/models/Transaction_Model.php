<?php
class Transaction_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function insert_main_transaction($main_trac){
		
		//print_r($data);
		
		$results=$this->db->insert('pos_main_trans', $main_trac);
		$insert_id=$this->db->insert_id();
		//$this->transaction_list($products,$insert_id);
		//transaction_list($products,$insert_id);
		return $insert_id;
	}
	
	function transaction_list($trac_list){
		$results=$this->db->insert('pos_transaction', $trac_list);
		return $results;
	}
	/*
	function get_product_list(){
		$this->db->select('products_id,product_title,product_price,p_img');
		$this->db->from('pos_products');
		$data= $this->db->get();
		return $data;
	
	}
	function get_member_one($id){
		$this->db->select('m_id,m_factoryID,m_email,m_password,m_name');
		$this->db->from('member_data');
		$this->db->where('m_id',$id);
		$data= $this->db->get();
		return $data;
	
	}
	
	function add_product($data){
		$results=$this->db->insert('pos_products', $data); 
		return $results;	
	}
	
	function add_to_cart($data){
		$results=$this->db->insert('pos_products', $data); 
		return $results;	
	}
	*/
}
?>