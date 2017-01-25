<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_video_list()
    {
        $this->db->select('products_id,product_price,product_content,product_title,create_time,read_count,status');
        $this->db->from('pos_products');
        $this->db->where('type', 'Video');
        $data = $this->db->get();
        return $data;
    }

    function latest_video()
    {
        $this->db->select('products_id,product_content,product_title');
        $this->db->from('pos_products');
        $this->db->order_by("create_time", "desc");
        $this->db->where('type', 'Video');
        $this->db->limit(3);
        $data = $this->db->get();
        return $data;
    }

    function get_video_one($id = "")
    {
        $this->db->select('author_id,products_id,product_price,product_content,product_title,create_time,read_count,start_date,end_date,video,status,picture');
        $this->db->from('pos_products');
        $this->db->where('products_id', $id);
        return $this->db->get();
    }

    function add_video($data)
    {
        $results = $this->db->insert('pos_products', $data);
        return $results;
    }

    function update_video($data, $id)
    {
        $this->db->where('products_id', $id);
        $results = $this->db->update('pos_products', $data);
        return $results;
    }

    function delete_video($id)
    {
        $results = $this->db->delete('pos_products', array('products_id' => $id));
        return $results;
    }
}
?>