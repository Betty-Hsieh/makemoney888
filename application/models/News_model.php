<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class News_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }
	
	function get_news_list($data=""){
		$this->db->select('*');
		$this->db->from('content_tab');
        if(!empty($data['fid'])){
            $this->db->where('fid',$data['fid']);
        }
        $this->db->where('type',"News");
        $this->db->order_by("create_time", "desc");
		$data= $this->db->get();
		return $data;
	}
	
	function latest_news(){
		$this->db->select('topic,content,id,uniqid_id');
		$this->db->from('content_tab');
		$this->db->order_by("create_time", "desc"); 
		$this->db->limit(5);
		$data= $this->db->get();
		return $data;
	}
	
	function get_news_one($id){
		$this->db->select('*');
		$this->db->from('content_tab');
		$this->db->where('id',$id);
		return $this->db->get();
	}
	
	function add_news($data){
		$results=$this->db->insert('content_tab', $data); 
		return $results;	
	}
	
	function update_news($data,$id){
		$this->db->where('id', $id);
		$results=$this->db->update('content_tab', $data); 
		return $results;	
	}
	
	function delete_news($id){
		$results=$this->db->delete('content_tab', array('id' => $id)); 
		return $results;	
	}
}
?>