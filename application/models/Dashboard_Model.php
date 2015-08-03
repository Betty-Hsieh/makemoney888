<?php
class Dashboard_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function get_member_list(){
		$this->db->select('*');
		$this->db->from('content_tab');
		$data= $this->db->get();
		return $data;
	
	}
	
}
?>