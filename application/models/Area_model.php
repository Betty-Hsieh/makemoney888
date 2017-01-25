<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_area_list()
    {
        $this->db->select('m_area,region_name,road_name');
        $this->db->from('cityarea');
        return $this->db->get();
    }

    
    function get_area_one($id)
    {
        $this->db->select('m_area,region_name,road_name');
        $this->db->from('cityarea');
        $this->db->where('m_area', $id);
        return $this->db->get();
    }

    
}
?>