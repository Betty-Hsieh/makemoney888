<?php
class Login_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function member_login($login_member){
		$this->db->select('m_id,m_permissionsID,m_name,personal_picture');
		$this->db->from('member_data');
		$this->db->where('m_email',$login_member['m_email']);
		$this->db->where('m_password',$login_member['m_password']);
		$login_results= $this->db->get();
		return $login_results;
	}
}
?>