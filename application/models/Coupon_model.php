<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Coupon_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }
	
	function get_course_list(){
		$this->db->select('p.products_id,p.picture,p.address,p.numbers,p.product_title,p.product_content,p.uniqid_id,p.status,p.create_time,p.read_count,p.product_price,m.m_name');
		$this->db->from('pos_products as p');
        $this->db->join('member_data as m', 'p.author_id = m.m_id');
        $this->db->where('type','Course');
        $this->db->order_by("p.products_id", "desc"); 
		$data= $this->db->get();
		return $data;
	}
    
    function get_course_applicant($id){
        $this->db->select('m.receiver,m.email,m.send_address,m.org_mid,m.cell_phone,m.contact_phone');
		$this->db->from('main_transation as m');
        $this->db->join('sub_transaction as s', 'm.id = s.trans_main_id');
        $this->db->where('s.products_id',$id);
        $data= $this->db->get();
		return $data;
	}
	
	function latest_course(){
		$this->db->select('products_id,product_title,product_content,uniqid_id,status,create_time,read_count,product_price');
		$this->db->from('pos_products');
        $this->db->where('type','Course');
		$this->db->order_by("create_time", "desc"); 
		$this->db->limit(4);
		$data= $this->db->get();
		return $data;
	}
	
	function get_course_one($id){
		$this->db->select('m.m_name,p.due_date,p.contact_phone,p.period,p.author_id,p.address,p.numbers,p.picture,p.product_title,p.product_content,p.uniqid_id,p.create_time,p.read_count,p.product_price,p.status');
		$this->db->from('pos_products as p');
        $this->db->join('member_data as m', 'p.author_id = m.m_id');
		$this->db->where('p.uniqid_id',$id);
		return $this->db->get();
	}
    
    function get_course_name($id){
		$this->db->select('p.product_title');
		$this->db->from('pos_products as p');
        $this->db->join('member_data as m', 'p.author_id = m.m_id');
		$this->db->where('p.products_id',$id);
		return $this->db->get();
	}
	
	function add_course($data){
		$results=$this->db->insert('pos_products', $data); 
		return $results;	
	}
	
	function update_course($data,$id){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('pos_products', $data); 
		return $results;	
	}
	
	function delete_course($id){
		$results=$this->db->delete('pos_products', array('uniqid_id' => $id)); 
		return $results;	
	}
}
?>