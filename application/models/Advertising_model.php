<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Advertising_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }
	
	function get_advertising_list(){
		$this->db->select('title,content,id,status,create_time,read_count,picture,subtype');
		$this->db->from('content_tab');
        $this->db->where('menu_id',3);
		$data= $this->db->get();
		return $data;
	}
    
    function get_advertising_display_to_index(){
		$this->db->select('title,content,id,picture,subtype');
		$this->db->from('content_tab');
        $this->db->where('menu_id',3);
        $this->db->where('status',1);
		$data= $this->db->get();
		return $data;
	}
	
	function latest_advertising(){
		$this->db->select('title,picture,content,id');
		$this->db->from('content_tab');
		$this->db->order_by("create_time", "desc"); 
		$this->db->limit(5);
		$data= $this->db->get();
		return $data;
	}
	
	function get_advertising_one($id){
		$this->db->select('title,uniqid_id,picture,subtype,content,id,status');
		$this->db->from('content_tab');
		$this->db->where('id',$id);
		return $this->db->get();
	}
	
	function add_advertising($data){
		$results=$this->db->insert('content_tab', $data); 
		return $results;	
	}
	
	function update_advertising($data,$id){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('content_tab', $data); 
		return $results;	
	}
	
	function delete_advertising($id){
		$results=$this->db->delete('content_tab', array('id' => $id)); 
		return $results;	
	}
    
    function get_sub_type(){
        $data=array(
            'Main'=>'主廣告區',
            'Sub1'=>'廣告區域1',
            'Sub2'=>'廣告區域2',
            'Sub3'=>'廣告區域3',
        );
        return $data;
    }
}
?>