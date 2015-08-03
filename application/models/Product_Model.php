<?php
class Product_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_product_list(){
		$this->db->select('products_id,product_title,product_price,p_img');
		$this->db->from('pos_products');
		$data= $this->db->get();
		return $data;
	
	}
	
	function add_product($data){
		$results=$this->db->insert('pos_products', $data); 
		return $results;	
	}
	
	
	function get_product_one($id){
		$this->db->select('m_factoryID,product_price,product_title');
		$this->db->from('pos_products');
		$this->db->where('products_id',$id);
		$data= $this->db->get();
		return $data;
	
	}	
	
	
	
}
?>