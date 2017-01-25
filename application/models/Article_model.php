<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Article_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_article_list($data="")
    {
        $this->db->select('uniqid_id,products_id,product_title,article_tag,author_id,article_status,read_status,product_content,create_time,read_count,m_name');
        $this->db->from('pos_products');
        $this->db->join('member_data', 'pos_products.author_id = member_data.m_id');
        $this->db->where('pos_products.type','Article');
        
        if($data['author']!=""){
            $this->db->where('member_data.m_id',$data['author']);
        }
        
        if($data['article_tag']!=""){
            $this->db->where('pos_products.article_tag',$data['article_tag']);
        }
        
        $data = $this->db->get();
        return $data;
    }
    
    function keynote_article()
    {
        $this->db->select('products_id,product_title,article_tag,author_id,article_status,read_status,product_content,create_time,read_count,m_name');
        $this->db->from('pos_products');
        $this->db->join('member_data', 'pos_products.author_id = member_data.m_id');
        $this->db->where('pos_products.article_type','keynote');
        $this->db->order_by("pos_products.create_time", "desc");
        $data = $this->db->get();
        return $data;
    }
    
    function psychology_article()
    {
        $this->db->select('p.uniqid_id,p.products_id,p.product_title,p.article_tag,p.picture,article_status,read_status,product_content,create_time,read_count,m_name');
        $this->db->from('pos_products as p');
        $this->db->join('member_data', 'p.author_id = member_data.m_id');
        $this->db->where('p.article_tag','psy');
        $this->db->order_by("p.create_time", "desc");
        $data = $this->db->get();
        return $data;
    }
    
    function author_articles($data="")
    {
        $this->db->select('p.product_title,p.article_tag,p.author_id,p.product_content,p.create_time,p.read_count,m.m_name');
        $this->db->from('pos_products as p');
        $this->db->join('member_data as m', 'p.author_id = m.m_id');
        $this->db->where('p.author_id',$data['author_id']);
        $this->db->order_by("p.create_time", "desc");
        $data = $this->db->get();
        return $data;
    }

    function latest_article()
    {
        $this->db->select('p.uniqid_id,p.picture,p.products_id,p.product_title,p.article_tag,p.author_id,p.article_status,p.read_status,p.product_content,p.create_time,p.read_count,m.m_name');
        $this->db->from('pos_products as p');
        $this->db->join('member_data as m', 'p.author_id = m.m_id');
        $this->db->where('p.type','Article');
        $this->db->order_by("p.create_time", "desc");
        $this->db->limit(5);
        $data = $this->db->get();
        return $data;
    }

    function get_article_one($id)
    {
        $this->db->select('picture,article_type,uniqid_id,products_id,product_title,article_tag,author_id,article_status,read_status,product_content,create_time,read_count');
        $this->db->from('pos_products');
        $this->db->where('uniqid_id', $id);
        return $this->db->get();
    }

    function add_article($data)
    {
        $results = $this->db->insert('pos_products', $data);
        return $results;
    }

    function update_article($data, $id)
    {
        $this->db->where('uniqid_id', $id);
        $results = $this->db->update('pos_products', $data);
        return $results;
    }

    function delete_article($id)
    {
        $results = $this->db->delete('pos_products', array('uniqid_id' => $id));
        return $results;
    }

    function query_article_category()
    {
        $this->db->select('*');
        $this->db->from('keyvalue');
        $this->db->where('fkey', 'Article_Category');
        return $this->db->get();
    }

    function adding_article_count($id)
    {
        return $this->db->query("update pos_products set read_count=read_count+1 where uniqid_id='".$id."'");
    }
}
?>