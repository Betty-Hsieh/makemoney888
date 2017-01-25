<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Contact_model extends CI_Model{
	
	public function __construct(){
        parent::__construct();
    }
	
	function get_contact_data($data=""){
		$this->db->select('title,content,id,uniqid_id');
		$this->db->from('content_tab');
        $this->db->where('type',"ContactUS");
        
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
    
	function add_contact($data){
		$results=$this->db->insert('content_tab', $data); 
		return $results;	
	}
	
	function update_contact($data,$id){
		$this->db->where('uniqid_id', $id);
		$results=$this->db->update('content_tab', $data); 
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