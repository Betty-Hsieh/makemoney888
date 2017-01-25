<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function admin_login($data){
		$this->db->select('m_id,m_name,m_email,fid');
		$this->db->from('member_data');
		$this->db->where('m_email',$data['email']);
		$this->db->where('m_password',$data['password']);
		$this->db->limit(1);
		return $this->db->get();
	}
}
?>