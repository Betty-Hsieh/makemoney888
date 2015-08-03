<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('Login_Model');
		$this->load->helper('url');   //
		$this->load->library('session');
	}
	
	public function member_login_page()
	{
		$this->load->view('login_page');
	}
	
	public function member_login()
	{
		$login_member = array(
			'm_email' => $this->input->post('username'),
			'm_password' => $this->input->post('password')
		);
		$login_results=$this->Login_Model->member_login($login_member);
		$data['member_data']=$login_results->result();
		//print_r($data['member_data']);
		foreach($data['member_data'] as $key => $row){
			$user_name=$row->m_name;
			$user_id=$row->m_id;
			$permission=$row->m_permissionsID;
			$personal_picture=$row->personal_picture;
		}
		
		$session_data = array(
			'user_email' => $this->input->post('username'),
			'user_name'=>$user_name,
			'user_id'=>$user_id,
			'permission'=>$permission,
			'is_logged_in' => true,
			'personal_picture'=>$personal_picture
		);
		$this->session->set_userdata($session_data);
		$user_id=$this->session->userdata('user_id');
		echo $user_id;
	}
	
}
