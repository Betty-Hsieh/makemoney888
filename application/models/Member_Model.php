<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_member_list()
    {
        $this->db->select('m_id,m_email,m_password,m_name,status');
        $this->db->from('member_data');
        $data = $this->db->get();
        return $data;
    }

    function get_author_list()
    {
        $this->db->select('m_id,m_name,m_email');
        $this->db->from('member_data');
        $this->db->order_by("m_factoryID", "dapin"); 
        return $this->db->get();
    }

    function get_member_one($id)
    {
        $this->db->select('m_id,m_email,m_password,m_name,picture,status,introduction,permissions_id');
        $this->db->from('member_data');
        $this->db->where('m_id', $id);
        return $this->db->get();
    }

    function add_member($data)
    {
        $results = $this->db->insert('member_data', $data);
        return $results;
    }

    function update_member($data, $id)
    {
        $this->db->where('m_id', $id);
        $results = $this->db->update('member_data', $data);
        return $results;
    }

    function delete_member($id)
    {
        $rs = $this->db->delete('member_data', array('m_id' => $id));
        return $rs;
    }
}
?>