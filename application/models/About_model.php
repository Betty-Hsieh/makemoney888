<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class About_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }
	
	function get_about_data($data=""){
		$this->db->select('title,content,id,uniqid_id');
		$this->db->from('content_tab');
        $this->db->where('type',"about");
        
        if(!empty($data['fid'])){
            $this->db->where('fid',$data['fid']);
        }
        
		$query= $this->db->get();
        if ($query->num_rows() > 0){
           $row = $query->row();
           return $row;
        }
        else{
            return 0;
        }
	}
    
	function add_about($data){
		$results=$this->db->insert('content_tab', $data); 
		return $results;	
	}
	
	function update_about($data,$id){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('content_tab', $data); 
		return $results;	
	}
}
?>