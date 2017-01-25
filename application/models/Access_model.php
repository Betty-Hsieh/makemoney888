<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Access_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_access_list()
    {
        $this->db->select('m_memberLimit,pid');
        $this->db->from('member_permission');
        $data = $this->db->get();
        return $data;
    }

    function latest_access()
    {
        $this->db->select('products_id,product_titlproduct_content,create_time,read_count,m_name');
        $this->db->from('member_permission');
        $this->db->order_by("create_time", "desc");
        $this->db->limit(5);
        $data = $this->db->get();
        return $data;
    }

    function get_access_one($id)
    {
        $this->db->select('products_id,product_titleproduct_content,create_time,read_count');
        $this->db->from('member_permission');
        $this->db->where('products_id', $id);
        return $this->db->get();
    }

    function add_access($data)
    {
        $results = $this->db->insert('pos_products', $data);
        return $results;
    }

    function update_access($data, $id)
    {
        $this->db->where('products_id', $id);
        $results = $this->db->update('member_permission', $data);
        return $results;
    }

    function delete_access($id)
    {
        $results = $this->db->delete('member_permission', array('products_id' => $id));
        return $results;
    }

    
}
?>